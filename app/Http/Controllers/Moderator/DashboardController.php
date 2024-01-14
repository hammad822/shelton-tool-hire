<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolServices;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $tools = Tool::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
        $role = Role::where('name', 'owner')->first();
        $owners = User::where('role_id', $role->id)->get();

        $pendingTools = Tool::where('status', 'Pending')->count();
        $pendingServices = ToolServices::where('status', 'Pending')->count();

        return view('moderator.dashboard', compact('tools', 'owners', 'pendingTools', 'pendingServices'));
    }

    public function pendingTool()
    {
        $tools = Tool::where('status', 'Pending')->orderBy('created_at', 'desc')->get();
        $role = Role::where('name', 'owner')->first();
        $owners = User::where('role_id', $role->id)->get();

        $pendingTools = Tool::where('status', 'Pending')->count();
        $pendingServices = ToolServices::where('status', 'Pending')->count();

        return view('moderator.tool.pending', compact('tools', 'owners', 'pendingTools', 'pendingServices'));
    }

    public function pendingServices()
    {
        $services = ToolServices::where('status', 'Pending')->with('subServices')->orderBy('created_at', 'desc')->get();
        $pendingTools = Tool::where('status', 'Pending')->count();
        $pendingServices = ToolServices::where('status', 'Pending')->count();

        return view('moderator.tool.pending-services', compact('services', 'pendingTools', 'pendingServices'));
    }

    public function approveTool($id)
    {
        $tool = Tool::find($id);
        $tool->status = 'Approved';
        $tool->save();

        return redirect()->back()->with('success', 'Tool Approved Successfully');
    }
    public function rejectTool($id)
    {
        $tool = Tool::find($id);
        $tool->status = 'Rejected';
        $tool->save();

        return redirect()->back()->with('success', 'Tool Rejected Successfully');
    }

    public function approveService($id)
    {
        $service = ToolServices::find($id);
        $service->status = 'Approved';
        $service->save();

        return redirect()->back()->with('success', 'Service Approved Successfully');
    }
    public function rejectService($id)
    {
        $service = ToolServices::find($id);
        $service->status = 'Rejected';
        $service->save();

        return redirect()->back()->with('success', 'Service Rejected Successfully');
    }
}
