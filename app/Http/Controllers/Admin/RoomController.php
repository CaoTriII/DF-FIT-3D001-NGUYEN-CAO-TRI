<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Room\StoreRequest;
use App\Http\Requests\Admin\Room\UpdateRequest;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Roomimage;
use Illuminate\Support\Facades\Auth;
use DateTime;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::orderBy('created_at','ASC')->withTrashed()->get();
        return view ('admin.modules.room.index',[
            'room' => $room
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = Hotel::get();
        $user = User::get();
        return view ('admin.modules.room.create',[
            'hotel'=>$hotel,
            'user'=>$user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
            $room = new Room();
            $file = $request->image;
            $fileName = time() . '-' . $file->getClientOriginalName();
            $room->name = $request->name;
            $room->price = $request->price;
            $room->description = $request->description;
            $room->content = $request->content;
            $room->status = $request->status;
            $room->featured = $request->featured;
            $room->room_quantity_status = $request->room_quantity_status;
            $room->room_quantity = $request->room_quantity;
            $room->hotel_id = $request->hotel_id;
            $room->image = $fileName;
            $room->save();
            $file->move(public_path('uploads/'), $fileName);

            if (count($request->images)>0){
                $count = 0;
                $data_images = [];
                foreach ($request->images as $img_detail){
                    $count++;
                    $fileNameDetail = $count . '-' .time() . '-' . $img_detail->getClientOriginalName();
                    $img_detail->move(public_path('uploads/'),$fileNameDetail);
                    $data_images[] = [
                        'images'=>$fileNameDetail,
                        'room_id'=>$room->id,
                        'created_at' => new DateTime(),
                        'updated_at'=>new DateTime(),
                    ];
                }

                Roomimage::insert($data_images);
            }
            return redirect()->route('admin.hotel.index')->with('success','Create room successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $hotel = Hotel::get();
        $user = User::get();
        $room = Room::with('room_image')->findOrFail($id);
        // dd($room);
        return view ('admin.modules.room.edit',[
            'id'=>$id,
            'hotel'=>$hotel,
            'user'=>$user,
            'room'=>$room
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $room =  Room::find($id);
        if($room == null){
            abort(404);
        }
        $file = $request->image;
        if(!empty($file)){
            $request ->validate([
                'image'=> 'required|mimes:jpg,bmp,png,jpeg',
            ],[
                'image.required'=>'Please enter room image',
                'image.mimes'=>'Image must be jpg,bmp,png,jpeg'
            ]);
            $old_image_path = public_path('uploads/' . $room->image);
            if(file_exists($old_image_path)){
                unlink($old_image_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $room->image = $fileName;
            $file->move(public_path('uploads/'), $fileName);
        }
        $room->name = $request->name;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->content = $request->content;
        $room->status = $request->status;
        $room->featured = $request->featured;
        $room->room_quantity_status = $request->room_quantity_status;
        $room->room_quantity = $request->room_quantity;
        $room->user_id = Auth::user()->id;
        $room->hotel_id = $request->hotel_id;
        $room->save();
        if (count($request->images)>0){
            $count = 0;
            $data_images = [];
            foreach ($request->images as $img_detail){
                $count++;
                $fileNameDetail = $count . '-' .time() . '-' . $img_detail->getClientOriginalName();
                $img_detail->move(public_path('uploads/'),$fileNameDetail);
                $data_images[] = [
                    'images'=>$fileNameDetail,
                    'room_id'=>$room->id,
                    'created_at' => new DateTime(),
                    'updated_at'=>new DateTime(),
                ];
            }
            Roomimage::insert($data_images);
        }
        return redirect()->route('admin.room.index')->with('success','Upload room successfully');
    }
    public function destroy(int $id)
    {
        $room = Room::find($id);
        if (!$room) {
            abort(404);
        }



        // Thực hiện soft-delete
        $room->delete();

        return redirect()->route('admin.room.index')->with('success', 'Room deleted successfully');
    }
    public function uploadFile (Request $request, $id)
    {
        $file = $request->image;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('uploads/'), $fileName);
        $room_image = Roomimage::find($id);
        $file_old_url = public_path('uploads/'. $room_image->images);
        if (file_exists($file_old_url)) {
            unlink($file_old_url);
        }
        $room_image->images = $fileName;
        $room_image->save();

        return response()->json([
            'message' => 'Image upload successfully'
        ],200);
    }
    public function deleteFile ($id)
    {
        $room_image = Roomimage::find($id);
        $file_old_url = public_path('uploads/'. $room_image->images);
        if (file_exists($file_old_url)) {
            unlink($file_old_url);
        }
        $room_image->delete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $room = Room::withTrashed()->find($id);

        if (!$room) {
            abort(404);
        }

        $room->restore();

        return redirect()->route('admin.room.index')->with('success', 'Room restored successfully');
    }
}
