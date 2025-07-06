namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class HomeController extends Controller
{
    public function dashboard()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('dashboard', compact('tasks'));
    }
}
