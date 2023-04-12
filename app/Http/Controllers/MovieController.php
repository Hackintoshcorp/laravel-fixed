<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        Storage::delete("public/" . $movie->img);

        $movie->delete();

        return response()->json(
            ["message" => "Movie deletion was successful."],
            200
        );
    }

    public function edit(Request $request, $id)
    {
        $title = $request->input("title");
        $description = $request->input("description");
        $url = $request->input("url");

        $movie = Movie::findOrFail($id);
        $movie->title = $title;
        $movie->description = $description;
        $movie->url = $url;
        $responseData = ["message" => "Movie edit was successful."];
        if ($request->hasFile("image")) {
            $img = $request->file("image");
            $image = Image::make($img);
            $image->fit(400, 500);
            $image->save(storage_path("app/public/" . $img->hashName()));
            $movie->img = $img->hashName();
            $responseData["imageName"] = $img->hashName();
        }

        $movie->save();

        return response()->json($responseData, 200);
    }

    public function toggleSeen($id)
    {
        $movie = Movie::findOrFail($id);
        $newSeenValue = $movie->seen == "yes" ? "no" : "yes";
        $movie->seen = $newSeenValue;

        $movie->save();

        return response()->json(
            ["message" => "Movie seen status updated successfully."],
            200
        );
    }

    public function updateWatch(Request $request, $id)
    {
        $date = $request->input("date");
        $movie = Movie::findOrFail($id);
        $movie->watch_soon = $date;

        $movie->save();

        return response()->json(
            ["message" => "Movie upcoming status updated successfully."],
            200
        );
    }

    public function store(Request $request)
    {
        $title = $request->input("title");
        $description = $request->input("description");
        $url = $request->input("url");
        $img = $request->file("img");
        $seen = "Not seen";
        $watch_soon = "";
        $email = Auth::user()->email;

        $image = Image::make($img);
        $image->fit(400, 500);
        $image->save(storage_path("app/public/" . $img->hashName()));

        Movie::create([
            "email" => $email,
            "title" => $title,
            "description" => $description,
            "url" => $url,
            "img" => $img->hashName(),
            "seen" => $seen,
            "watch_soon" => $watch_soon,
        ]);

        return response()->json(
            ["message" => "Movie added to list successfully."],
            200
        );
    }

    public function index(Request $request)
    {
        //Check if search/sort/upcoming meets specified validation rules.
        $request->validate([
            "search" => "nullable|string|max:255",
            "sort" => "nullable|in:A-Z,Z-A",
            "upcoming" => "nullable|in:true,false",
        ]);

        $email = Auth::user()->email;

        $query = Movie::where("email", $email);

        if ($request->has("search")) {
            $searchTerm = "%" . $request->input("search") . "%";
            $query->where("title", "like", $searchTerm);
        }

        if ($request->has("sort")) {
            if ($request->input("sort") == "A-Z") {
                $query->orderBy("title", "asc");
            } elseif ($request->input("sort") == "Z-A") {
                $query->orderBy("title", "desc");
            }
        }

        if ($request->has("upcoming")) {
            if ($request->input("upcoming") == "true") {
                $query->where(function ($query) {
                    $query
                        ->where("watch_soon", "LIKE", "%____-__-_%")
                        ->whereRaw("DAY(watch_soon) % 2 = 0")
                        ->orWhere("watch_soon", ">", date("Y-m-d"));
                });
            } elseif ($request->input("upcoming") == "false") {
                $query->where(function ($query) {
                    $query
                        ->where("watch_soon", "=", null)
                        ->orWhere("watch_soon", "=", "");
                });
            }
        }

        $movies = $query->paginate(15);

        $movies->appends([
            "search" => $request->input("search"),
            "sort" => $request->input("sort"),
            "upcoming" => $request->input("upcoming"),
        ]);

        return view("dashboard", compact("movies"));
    }
}
