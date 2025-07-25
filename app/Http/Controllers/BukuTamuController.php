<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTamu;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;

class BukuTamuController extends Controller
{
    protected $geographicData = [
        'kabupaten' => ['Gunungkidul'],
        'kecamatan' => [
            'Gedangsari',
            'Girisubo',
            'Karangmojo',
            'Ngawen',
            'Nglipar',
            'Paliyan',
            'Panggang',
            'Patuk',
            'Playen',
            'Ponjong',
            'Purwosari',
            'Rongkop',
            'Saptosari',
            'Semanu',
            'Semin',
            'Tanjungsari',
            'Tepus',
            'Wonosari'
        ],
        'desa' => [
            'Gedangsari' => [
                'Hargomulyo',
                'Mertelu',
                'Ngalang',
                'Sampang',
                'Serut',
                'Tegalrejo',
                'Watugajah'
            ],
            'Girisubo' => [
                'Balong',
                'Jepitu',
                'Jerukwudel',
                'Karanggawen',
                'Nglindur',
                'Pucung',
                'Songbanyu',
                'Tileng'
            ],
            'Karangmojo' => [
                'Bejiharjo',
                'Bendungan',
                'Gedangrejo',
                'Jatiayu',
                'Karangmojo',
                'Kelor',
                'Ngawis',
                'Ngipak',
                'Wiladeg'
            ],
            'Ngawen' => [
                'Beji',
                'Jurangjero',
                'Kampung',
                'Sambirejo',
                'Tancep',
                'Watusigar'
            ],
            'Nglipar' => [
                'Katongan',
                'Kedungkeris',
                'Kedungpoh',
                'Natah',
                'Nglipar',
                'Pengkol',
                'Pilangrejo'
            ],
            'Paliyan' => [
                'Giring',
                'Grogol',
                'Karangasem',
                'Karangduwet',
                'Mulusan',
                'Pampang',
                'Sodo'
            ],
            'Panggang' => [
                'Giriharjo',
                'Girikarto',
                'Girimulyo',
                'Girisekar',
                'Girisuko',
                'Giriwungu'
            ],
            'Patuk' => [
                'Beji',
                'Bunder',
                'Nglanggeran',
                'Nglego',
                'Ngoro-oro',
                'Patuk',
                'Pengkok',
                'Putat',
                'Salam',
                'Semoyo',
                'Terbah'
            ],
            'Playen' => [
                'Banaran',
                'Bandung',
                'Banyusoco',
                'Bleberan',
                'Dengok',
                'Gading',
                'Getas',
                'Logandeng',
                'Ngawu',
                'Ngleri',
                'Ngunut',
                'Playen',
                'Plembutan'
            ],
            'Ponjong' => [
                'Bedoyo',
                'Genjahan',
                'Gombang',
                'Karangasem',
                'Kenteng',
                'Ponjong',
                'Sawahan',
                'Sidorejo',
                'Sumbergiri',
                'Tambakromo',
                'Umbulrejo'
            ],
            'Purwosari' => [
                'Giriasih',
                'Giricahyo',
                'Girijati',
                'Giripurwo',
                'Giritirto'
            ],
            'Rongkop' => [
                'Bohol',
                'Botodayaan',
                'Karangwuni',
                'Melikan',
                'Petir',
                'Pringombo',
                'Pucanganom',
                'Semugih'
            ],
            'Saptosari' => [
                'Jetis',
                'Kaniogoro',
                'Kepek',
                'Krambilsawit',
                'Monggol',
                'Ngloro',
                'Planjan'
            ],
            'Semanu' => [
                'Candirejo',
                'Dadapayu',
                'Ngeposari',
                'Pacarejo',
                'Semanu'
            ],
            'Semin' => [
                'Bendung',
                'Bulurejo',
                'Kalitekuk',
                'Karangsari',
                'Kemejing',
                'Pundungsari',
                'Rejosari',
                'Semin',
                'Sumberejo'
            ],
            'Tanjungsari' => [
                'Banjarejo',
                'Hargosari',
                'Kemadang',
                'Kemiri',
                'Ngestirejo'
            ],
            'Tepus' => [
                'Giripanggung',
                'Purwodadi',
                'Sidoharjo',
                'Sumberwungu',
                'Tepus'
            ],
            'Wonosari' => [
                'Baleharjo',
                'Duwet',
                'Gari',
                'Karangrejek',
                'Karangtengah',
                'Kepek',
                'Mulo',
                'Piyaman',
                'Pulutan',
                'Selang',
                'Siraman',
                'Wareng',
                'Wonosari',
                'Wunung'
            ]
        ],
        'genders' => ['Laki-laki', 'Perempuan']
    ];

    public function index()
    {
        return view('buku-tamu', [
            'kabupaten' => $this->geographicData['kabupaten'],
            'kecamatan' => $this->geographicData['kecamatan'],
            'desa' => $this->geographicData['desa'],
            'genders' => $this->geographicData['genders']
        ]);
    }

    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:100',
                'Dari' => 'nullable|string|max:100',
                'no_telp' => 'required|string|max:15',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'keperluan' => 'required|string|max:255',
                'foto_data' => 'nullable|string'
            ], [
                'nama.required' => 'Nama wajib diisi.',
                'nama.string' => 'Nama harus berupa teks.',
                'nama.max' => 'Nama maksimal 100 karakter.',

                'Dari.string' => 'Asal harus berupa teks.',
                'Dari.max' => 'Asal maksimal 100 karakter.',

                'no_telp.required' => 'Nomor telepon wajib diisi.',
                'no_telp.string' => 'Nomor telepon harus berupa teks.',
                'no_telp.max' => 'Nomor telepon maksimal 15 karakter.',

                'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
                'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',

                'keperluan.required' => 'Keperluan wajib diisi.',
                'keperluan.string' => 'Keperluan harus berupa teks.',
                'keperluan.max' => 'Keperluan maksimal 255 karakter.',

                'foto_data.string' => 'Data foto harus berupa string (base64).',
            ]);

            // Simpan ke database (anggap pakai DataTamu::create)
            $created = DataTamu::create([
                'nama' => $validatedData['nama'],
                'Dari' => $validatedData['Dari'] ?? null,
                'jam_datang' => now(),
                'alamat_asal' => implode(', ', [
                    $request->kabupaten ?? null,
                    $request->kecamatan ?? null,
                    $request->desa ?? null,
                ]),
                'asal' => $request->asal ?? null,
                'no_telp' => $validatedData['no_telp'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'keperluan' => $validatedData['keperluan'],
                'asal' => $request->asal ?? null,
                'foto' => $this->handlePhotoUpload($validatedData['foto_data'] ?? null),
            ]);

            if ($created && $created->id) {
                return redirect()->route('buku-tamu.index')->with('success', 'Data berhasil dikirim!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect otomatis ke halaman form dengan pesan error, jadi biasanya bagian ini tidak perlu ditulis.
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    protected function handlePhotoUpload($imageData)
    {
        if (!$imageData) return null;

        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $filename = 'tamu-foto/foto_' . time() . '.png';

        Storage::disk('public')->put($filename, $image);

        return $filename;
    }

    public function getDesa(Request $request)
    {
        $request->validate(['kecamatan' => 'required|string|max:50']);

        $selectedKecamatan = $request->kecamatan;
        $selectedDesa = $this->geographicData['desa'][$selectedKecamatan] ?? [];

        return response()->json($selectedDesa);
    }
}
