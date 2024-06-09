<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Buku extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $bukuModel = new BukuModel();

        // Mendapatkan keyword pencarian
        $search = $this->request->getGet('search');

        // Mendapatkan parameter urut
        $sort = $this->request->getGet('sort');

        //sort order
        $sort_order = $this->request->getVar('sort_order');

        // Query dasar
        $query = $bukuModel;

        // Jika ada keyword pencarian
        if ($search) {
            $query = $query->like('judul', $search)
                           ->orLike('penulis', $search)
                           ->orLike('penerbit', $search)
                           ->orLike('tahun_terbit', $search);
        }

        // Jika ada parameter urut
        if ($sort && in_array($sort, ['judul', 'penulis', 'penerbit', 'tahun_terbit'])) {
            $bukuModel->orderBy($sort, $sort_order ? $sort_order : 'ASC');
        }

        $data['bukus'] = $query->findAll();
        $data['search'] = $search;
        $data['sort'] = $sort;
        $data['sort_order'] = $sort_order;

        return view('buku/index', $data);
    }

    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'string' => 'Judul harus berupa string.'
                ]
            ],
            'penulis' => [
                'label' => 'Penulis',
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Penulis harus diisi.',
                    'string' => 'Penulis harus berupa string.'
                ]
            ],
            'penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'Penerbit harus diisi.',
                    'string' => 'Penerbit harus berupa string.'
                ]
            ],
            'tahun_terbit' => [
                'label' => 'Tahun Terbit',
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun Terbit harus diisi.',
                    'numeric' => 'Tahun Terbit harus berupa angka.',
                    'greater_than' => 'Tahun Terbit harus lebih besar dari 1800.',
                    'less_than' => 'Tahun Terbit harus kurang dari 2024.'
                ]
            ]
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return view('buku/create', ['validation' => $validation]);
        } else {
            $bukuModel = new BukuModel();
            $data = [
                'judul' => $this->request->getPost('judul'),
                'penulis' => $this->request->getPost('penulis'),
                'penerbit' => $this->request->getPost('penerbit'),
                'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            ];
            $bukuModel->save($data);
            return redirect()->to('/buku');
        }
    }

    public function edit($id)
    {
        $bukuModel = new BukuModel();
        $data['buku'] = $bukuModel->find($id);
        return view('buku/edit', $data);
    }

    public function update($id)
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'judul' => [
            'label' => 'Judul',
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Judul harus diisi.',
                'string' => 'Judul harus berupa string.'
            ]
        ],
        'penulis' => [
            'label' => 'Penulis',
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Penulis harus diisi.',
                'string' => 'Penulis harus berupa string.'
            ]
        ],
        'penerbit' => [
            'label' => 'Penerbit',
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Penerbit harus diisi.',
                'string' => 'Penerbit harus berupa string.'
            ]
        ],
        'tahun_terbit' => [
            'label' => 'Tahun Terbit',
            'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
            'errors' => [
                'required' => 'Tahun Terbit harus diisi.',
                'numeric' => 'Tahun Terbit harus berupa angka.',
                'greater_than' => 'Tahun Terbit harus lebih besar dari 1800.',
                'less_than' => 'Tahun Terbit harus kurang dari 2024.'
            ]
        ]
    ]);

    if ($validation->withRequest($this->request)->run() == FALSE) {
        $bukuModel = new BukuModel();
        return view('buku/edit', [
            'validation' => $validation,
            'buku' => $bukuModel->find($id)
        ]);
    } else {
        $bukuModel = new BukuModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];
        $bukuModel->update($id, $data);
        return redirect()->to('/buku');
    }
}

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        $bukuModel->delete($id);
        return redirect()->to('/buku');
    }
}
