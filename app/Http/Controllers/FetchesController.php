<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FetchesController extends Controller
{

    public function district(Request $request){
        $division = $request->get('division');
        if($request->ajax()){
            $data = DB::table('locations')->select('district')->where('division', 'like', '%' . $division . '%')->orderBy('district', 'asc')->distinct()->get();
            $total_row = $data->count();
            $output = '<option value="">District</option>';

            if($total_row > 0){
                foreach($data as $row){
                    $output .= '<option value="' . $row->district . '">' . $row->district . '</option>';
                }
            }
            else{
                $output .= '<option value="">Empty</option>';
            }
            return Response($output);
        }
    }

    public function city(Request $request){
        $division = $request->get('division');
        $district = $request->get('district');
        if($request->ajax()){
            $data = DB::table('locations')->select('city')->where('division', 'like', '%' . $division . '%')->where('district', 'like', '%' . $district . '%')->orderBy('city', 'asc')->distinct()->get();
            $total_row = $data->count();
            $output = '<option value="">City</option>';

            if($total_row > 0){
                foreach($data as $row){
                    $output .= '<option value="' . $row->city . '">' . $row->city . '</option>';
                }
            }
            else{
                $output .= '<option value="">Empty</option>';
            }

            return Response($output);
        }
    }

    public function partial(Request $request){
        $division = $request->get('division');
        $district = $request->get('district');
        $city = $request->get('city');
        if($request->ajax()){
            $data = DB::table('locations')->select('partial')->where('division', 'like', '%' . $division . '%')->where('district', 'like', '%' . $district . '%')->where('city', 'like', '%' . $city . '%')->orderBy('partial', 'asc')->distinct()->get();
            $total_row = $data->count();
            $output = '<option value="">Select One</option>';

            if($total_row > 0){
                foreach($data as $row){
                    $output .= '<option value="' . $row->partial . '">' . $row->partial . '</option>';
                }
            }
            else{
                $output .= '<option value="">Empty</option>';
            }

            return Response($output);
        }
    }

    public function ward(Request $request){
        $division = $request->get('division');
        $district = $request->get('district');
        $city = $request->get('city');
        $partial = $request->get('partial');
        if($request->ajax()){
            $data = DB::table('locations')->select('ward')->where('division', 'like', '%' . $division . '%')->where('district', 'like', '%' . $district . '%')->where('city', 'like', '%' . $city . '%')->where('partial', 'like', '%' . $partial . '%')->orderBy('ward', 'asc')->distinct()->get();
            $total_row = $data->count();
            $output = '<option value="">Ward / Union</option>';

            if($total_row > 0){
                foreach($data as $row){
                    $output .= '<option value="' . $row->ward . '">' . $row->ward . '</option>';
                }
            }
            else{
                $output .= '<option value="">Empty</option>';
            }

            return Response($output);
        }
    }

    public function validity(Request $request){
        $validity = $request->get('validity');
        $id = $request->get('id');
        if($request->ajax()){
            DB::table('posts')
            ->where('id', $id)
            ->update(['validity' => $validity]);

            $output = date('Y-m-d', strtotime($validity));
            return Response($output);
        }
    }

    public function status(Request $request){
        $id = $request->get('id');
        $status = Post::find($id);
        $status = ($status->status == 'PENDING') ? 'PUBLISHED' : 'PENDING';
        if($request->ajax()){
            DB::table('posts')
            ->where('id', $id)
            ->update(['status' => $status]);

            return Response('Post ' . $status);
        }
    }
}
