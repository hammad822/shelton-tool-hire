<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $tools = Tool::where('status', 'Approved')->where('is_enable', true)->orderBy('total_rating', 'desc')->get();

        return view('user.dashboard', compact('tools'));
    }

    public function searchTool(Request $request)
    {
        $q = Tool::query();
        if ($request->has('search') && $request->filled('search')) {
            $q->where(function ($query) use ($request) {
                $query->where('type', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('address', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('post_code', 'LIKE', '%' . $request->search . '%');

            });
        }
        $tools = $q->where('status', 'Approved')->where('is_enable', true)->orderBy('total_rating', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'view' => view('user.tool-table', compact('tools'))->render(),
        ]);
    }
}
