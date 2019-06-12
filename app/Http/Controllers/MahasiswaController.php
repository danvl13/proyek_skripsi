<?php

namespace App\Http\Controllers;
use App\{User,Acara};
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    public $module;

    public function __construct()
    {
        $this->module = 'mahasiswa';
    }

    public function index(){
        $list_mahasiswa= User::all();
        return view('mahasiswa.index')->with('list_mahasiswa',$list_mahasiswa)->with('module',$this->module);
    }

    public function create()
    {
        return view('mahasiswa.create')->with('module',$this->module);
    }

    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        return view('mahasiswa.create')->with('user',$user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nrp'=>'required|unique:users,nrp',
            'foto'=>'image'
        ]);

        $user = new User;
        $user->nrp = $request->input('nrp');
        $user->nama = $request->input('nama');
        $user->prodi = $request->input('prodi');
        $user->tahun = (int) Carbon::now()->format('Y');
        $user->ttl = $request->input('ttl');
        $user->alamat = $request->input('alamat');
        $user->agama = $request->input('agama');
        $user->jnskl = $request->input('jnskl');
        $user->nohp = $request->input('nohp');
        $user->line = $request->input('line');
        $user->email = $request->input('email');
        $user->ipk = 0;
        $user->jumkp = $request->input('jumkp');
        $user->hobi = $request->input('hobi');
        $user->motivasi = $request->input('motivasi');
        $user->komitmen = $request->input('komitmen');
        $user->keunggulan = $request->input('keunggulan');
        $user->kelemahan = $request->input('kelemahan');
        $user->username = $request->input('nrp');
        $user->password = $request->input('nrp');
        $user->status = 1;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/user');
            $image->move($destinationPath, $name);
            $user->foto = $name;
        }
        $user->save();
        
        return redirect()->route('mahasiswa.index');
    }

    public function gantiPassword(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        if($user->password==$request->input('old')){
            $user->password=$request->input('new');
            $user->save();
        }
        return redirect()->route('mahasiswa.profile');
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'foto'=>'image'
        ]);
        $user =User::findOrFail($request->input('id'));
        $user->ttl = $request->input('ttl');
        $user->alamat = $request->input('alamat');
        $user->agama = $request->input('agama');
        $user->jnskl = $request->input('jnskl');
        $user->nohp = $request->input('nohp');
        $user->line = $request->input('line');
        $user->email = $request->input('email');
        $user->ipk = $request->input('ipk');
        $user->jumkp = $request->input('jumkp');
        $user->hobi = $request->input('hobi');
        $user->motivasi = $request->input('motivasi');
        $user->komitmen = $request->input('komitmen');
        $user->keunggulan = $request->input('keunggulan');
        $user->kelemahan = $request->input('kelemahan');
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/user');
            $image->move($destinationPath, $name);
            $user->foto = $name;
        }
        $user->save();

        return redirect()->route('mahasiswa.profile');
    }
    public function profile()
    {
        $id = Auth::user()->id;
        $user=User::where('id',$id)->first();
        $list_acara=Acara::with(['jadwal' => function($q) use($id){
            $q->with('divisiperacara.divisi')->where('user_id',$id);
        }])->whereHas('jadwal', function($q) use($id){
            $q->where('user_id', $id);
        })
        ->where('status',1)
        ->get();

        return view('mahasiswa.profile')->with('user',$user)->with('list_acara',$list_acara);
    }

    public function view($id)
    {
        $user=User::where('id',$id)->first();
        return view('mahasiswa.view')->with('user',$user)->with('module',$this->module);
    }
    public function ganti($id)
    {
        $user=User::where('id', $id)->first();
        $user->status=2;
        $user->save();
        return redirect()->route('mahasiswa.index');
    }
}
