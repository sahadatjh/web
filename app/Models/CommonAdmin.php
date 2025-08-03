<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class CommonAdmin extends Model
{
    use HasFactory;

    protected $table = 'banners'; // Specify the table name

    public function getAllData($table_name)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     // ->where('status',1)
                     ->orderBy('id', 'desc')
                     ->get();

        return $data;
    }

    public function getAllDataWhere($table_name, $where)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where($where)
                     ->orderBy('id', 'desc')
                     ->get();

        return $data;
    }

    public function getAllDataWhereLimit($table_name, $where, $limit)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where($where)
                     ->orderBy('id', 'desc')
                     ->limit($limit)
                     ->get();

        return $data;
    }    

    public function insertData($data, $table_name)
    {
        // Use the query builder to insert data into the specified table
        $res = DB::table($table_name)->insert($data);

        if($res){
        	// Retrieve the ID of the last inserted record
			$insertedId = DB::getPdo()->lastInsertId();
			return $insertedId;
        }
        return false;
    }

    public function getDatabyId($id, $table_name)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where('id',$id)
                     ->first();

        return $data;
    }

    public function updatetData($data, $id, $table_name)
    {
        // Perform the update query
		$data = DB::table($table_name)
		    ->where('id', $id)
		    ->update($data);

        return $data;
    } 
    
    public function deleteData($id, $table_name)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where('id',$id)
                     ->delete();

        return $data;
    }

    public function deleteAllData($table_name, $where)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where($where)
                     ->delete();

        return $data;
    }

    public function getWebSetting($table_name)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->first();

        return $data;
    }

    public function getFirstRowData($table_name)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->first();

        return $data;
    }

    public function getIndividualDataWhere($table_name, $where)
    {
        // Use the query builder to retrieve data from the specified table
        $data = DB::table($table_name)
                     ->where($where)
                     ->first();

        return $data;
    }

}
