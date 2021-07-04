<?php

namespace App\Http\Controllers\Admin;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    public function index() {
        $userModel = new User();
        $users = $userModel->getUser();
        $users = $users->paginate(50);
        return view('admin.modules.users.index', compact('users'));

    }
    public function viewDetail($id) {
        $userModel = new User();
        $user = $userModel->getUserById($id);
        return view('admin.modules.users.detail-user',compact('user'));
    }
    public function searchName(Request $request){
        $userModel = new User();
        $users = $userModel->getUser();

        $search = $request->all();
        if(!empty($search['search_name'])) {
            $searchName = $search['search_name'];
            $users->where('name', 'LIKE', "%{$searchName}%");
        }
        if(!empty($search['search_email'])) {
            $searchEmail = $search['search_email'];
            $users->where('email', 'LIKE', "%{$searchEmail}%");
        }
        $users = $users->paginate(2);
        return view('admin.modules.users.index', compact('users'));
    }
    public function create() {
        
        return view('admin.modules.users.create');

    }
    public function uploadFile (Request $request) {
        $data = $request->all();
        $file_name =  null;
        $file = $request->file('image');
        $file_name = uniqid() . '.' . $file->getClientOriginalName();
        $linkFile =  'public/tmp/';
        $file->move($linkFile, $file_name);
        $dir = '/public/tmp/' . $file_name;
        return response()->json(['dir' => $dir, 'file_name' => $file_name]);
    }

    public function store(Request $request) {
        $data = $request->all();
        $fileName = $data['image'];
        $success = 0;
        $errors = [];
        $dataSave = new User();
        $validate = Validator::make($data , $dataSave->rules(), $dataSave->messages());
        if ($validate->fails()) {

             $validateErrors =  $validate->messages()->get('*');
             foreach ($validateErrors as $field => $error) {
                 $errors[$field] = $validateErrors[$field][0];
             }
        } else {
            $dataSave->name = $request->name;
            $dataSave->email = $request->email;
            $dataSave->phone_number = $request->phone_number;
            $dataSave->address = $request->address;
            $dataSave->image = $fileName;
            $dataSave->password = Hash::make($request->password);
            $dataSave->save();
            if ($dataSave->save()){
                if ($fileName !=null){} {
                    $tmp = $_SERVER['DOCUMENT_ROOT'] . '/public/tmp/' . $fileName;
                    $saveFile = $_SERVER['DOCUMENT_ROOT'] . '/public/img/' . $fileName;
                    rename($tmp, $saveFile);
                
                }
                $success = 1;
            }
        }
        if (empty($errors)) {
            $errors =  null;
        }

        return response()->json(['success'=>$success, 'error' => $errors]);
    }

    public function showEidt($id){
        $user = User::find($id);
        $view = view('admin.modules.users.components.edit',compact('user'))->render();
        return response()->json([
            'view' => $view
        ]);
        
    }
    
    // public function edit(Request $request, $id) {
    //     $user = User::find($id)->toArray();
    //         $id = $user['id'];
    //     if ($request->isMethod('post')) {
    //         $data = $request->all();
    //         $userModel = new User();
    //         $file_name = $data['image'];
    //         $success = 0;
    //         $errors = [];
    //         $validate = Validator::make($data , $userModel->rules($id), $userModel->messages());
    //         if ($validate->fails()) {
    //             $validateErrors =  $validate->messages()->get('*');
    //             foreach ($validateErrors as $field => $error) {
    //                 $errors[$field] = $validateErrors[$field][0];
    //         }
    //         }
    //         $user = $userModel::find($id);
    //         $user->name = $data['name'];
    //         $user->email = $data['email'];
    //         $user->phone_number = $data['phone_number'];
    //         $user->address = $data['address'];
    //         $check = false;
    //         if ($file_name !=$user->image) {
    //             $check = true;
    //         }
            
    //         $user->image = $file_name;
    //         if ($user->save()) {


    //             if ($check === true) {
    //                 $tmp = $_SERVER['DOCUMENT_ROOT'] . '/public/tmp/' . $file_name;
    //                 $saveFile = $_SERVER['DOCUMENT_ROOT'] . '/public/img/' . $file_name;
    //                 rename($tmp, $saveFile);
    //             }
    //             // if ($file_name != '') {
    //             //     $linkFile =  'public/img/';
    //             //     // $file->move($linkFile, $file_name);
    //             // }
    //             return  redirect()->route('admin.users.index');
    //         }
    //         $user->update();
    //     }
    //     return view('admin.modules.users.index',compact('user'));
    // }

    public function update(Request $request, $id) {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        $user->save();
        
        return response()->json([
            'mess' => 'Success'
        ]);

    }

    public function destroy(Request $request ,$id) {
        $userModel = new User();
        $user = $userModel::find($id);
        $user->user_delete = 1;
        $user->save();
    }
    
}
