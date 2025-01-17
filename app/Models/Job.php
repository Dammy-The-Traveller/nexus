<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Employer;
use \App\Models\Tag;
//if we have table called job_listings our class would be job_listing not job_listings
// class job_listing extends Model{

        
//     }
class Job extends Model{
    use HasFactory;
protected $table = 'job_listings';

// so instead of us doing this protected $fillable = ['employer_id','title', 'salary']; we can automatically disable it using protected $guarded = []; but we need to careful of this because of security vulnerabilities because right now this is not checking wether the input field matches what is in the protected so the only reason why we are doing this we don't want to be coming here every time to add thins to the array for checking
//protected $fillable = ['employer_id','title', 'salary'];

protected $guarded = [];

public function employer(){
    return $this->belongsTo(Employer::class);
}

public function Tags(){
    return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
}
}


// class Job{

//     // to make an object return array use ": array"
//     public static function all(): array{

//            return [
//             [
//                 "id"=>"1",
//                 "title"=> "Director",
//                 "Salary" => "$50,000"
//             ],
//             [
//                 "id"=>"2",
//                 "title"=> "Programmer",
//                 "Salary" => "$10,000"
//             ],
//             [
//                 "id"=>"3",
//                 "title"=> "Teacher",
//                 "Salary" => "$40,000"
//             ]
        
        
//             ];
//     }


//  public static function find(int $id): array{
//     $job =  Arr::first(static::all(), fn($job) => $job["id"] ==$id);

//     if(!$job){
//         abort(404);
//     }
//     return $job;
//  }
// }




