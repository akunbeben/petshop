<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->model('LaporanModel');
        $this->load->model('PenjualanModel');
        $this->load->model('PenitipanModel');
        $this->load->library('pdf');
        is_not_login();
    }

    public function inventori()
    {
        $data = [
            'title'     => 'Laporan Inventori',
            'inventori' => $this->LaporanModel->get_inventori()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'laporan/inventori', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Inventori',
                'inventori' => $this->LaporanModel->filter_inventori($param)->result()
            ];
            $this->template->load('layout/master', 'laporan/inventori', $data);
        }
    }

    public function stok_masuk()
    {
        $data = [
            'title'     => 'Laporan Stok Masuk',
            'stok'      => $this->LaporanModel->get_stok()->result()
        ];

        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'laporan/stok', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Stok',
                'stok'      => $this->LaporanModel->filter_stok($param)->result()
            ];
            $this->template->load('layout/master', 'laporan/stok', $data);
        }
    }

    public function inventori_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_inventori($id)->row(),
            'body'      => $this->LaporanModel->detail_inventori($id)->result(),
            'produk'    => $this->ProdukModel->get()->result(),
            'title'     => 'LAPORAN INVENTORI',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/print_inventori', $data);
        } else {
            $this->load->view('laporan/print_inventori', $data);
        }
    }

    public function stok_masuk_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_stok($id)->row(),
            'body'      => $this->LaporanModel->detail_stok($id)->result(),
            'produk'    => $this->ProdukModel->get()->result(),
            'title'     => 'LAPORAN STOK MASUK'
        ];

        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print_stok_masuk', $data);
    }

    public function penjualan_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_penjualan($id)->row(),
            'body'      => $this->LaporanModel->detail_penjualan($id)->result(),
            'title'     => 'LAPORAN PENJUALAN'
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print_penjualan', $data);
    }

    public function penitipan_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_penitipan($id)->row(),
            'body'      => $this->LaporanModel->detail_penitipan($id)->result(),
            'title'     => 'LAPORAN PENITIPAN MASUK'
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->no_doc);
        $this->pdf->load_view('laporan/print_penitipan', $data);
    }

    public function generate_inv()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(invAutoID(), '/INV'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 1
        ];

        $this->LaporanModel->generateInv($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $produk = $this->ProdukModel->get()->result_array();
        $data = array();

        foreach($produk as $prd){ 
            array_push($data, array(
                'id'        =>null,
                'doc_id'    =>$body,
                'produk'    =>$prd['nama_produk'],
                'jumlah'    =>$prd['stok'],
            ));
        }
        $this->session->set_flashdata('sukses-produk', 'Dokumen laporan berhasil di buat.');
        $this->LaporanModel->generate_inv($data);
        redirect('laporan/inventori/');
    }

    public function generate_stok()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(stokAutoID(), '/SM'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 2
        ];

        $this->LaporanModel->generateStok($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $produk = $this->ProdukModel->detail()->result_array();
        $data = array();

        foreach($produk as $prd){ 
            array_push($data, array(
                'id'            => null,
                'doc_id'        => $body,
                'produk'        => $prd['nama_produk'],
                'jumlah'        => $prd['jumlah'],
                'time_stamp'    => $prd['time_stamp'],
                'created_by'    => $prd['created_by']
            ));
        }
        $this->session->set_flashdata('sukses-produk', 'Dokumen laporan berhasil di buat.');
        $this->LaporanModel->generate_stok($data);
        redirect('laporan/stok-masuk/');
    }

    public function generate_penjualan()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(penjualanAutoID(), '/PJ'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 3
        ];

        $this->LaporanModel->generatePenjualan($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $penjualan = $this->PenjualanModel->get()->result();
        $data = array();

        foreach($penjualan as $prd){ 
            array_push($data, array(
                'id'            => null,
                'doc_id'        => $body,
                'faktur'        => $prd->faktur,
                'total'         => $prd->total,
                'profit'        => $prd->profit
            ));
        }
        $this->session->set_flashdata('sukses-produk', 'Dokumen laporan berhasil di buat.');
        $this->LaporanModel->generate_penjualan($data);
        redirect('laporan/penjualan/');
    }

    public function generate_penitipan()
    {
        $header = [
            'id'            => null,
            'no_doc'        => FormatNoTrans(penitipanAutoID(), '/PN'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('nama'),
            'doc_type'      => 4
        ];

        $this->LaporanModel->generatePenitipan($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $penitipan = $this->PenitipanModel->get()->result();
        $data = array();

        foreach($penitipan as $pntp){ 
            array_push($data, array(
                'id'                => null,
                'doc_id'            => $body,
                'nama_peliharaan'   => $pntp->nama_peliharaan,
                'pemilik'           => $pntp->nama,
                'catatan'           => $pntp->catatan,
                'tanggal_masuk'     => $pntp->tanggal_masuk
            ));
        }

        $this->session->set_flashdata('sukses-produk', 'Dokumen laporan berhasil di buat.');
        $this->LaporanModel->generate_penitipan($data);
        redirect('laporan/penitipan/');
    }

    public function penjualan()
    {
        $data = [
            'title'     => 'Laporan Penjualan',
            'penjualan' => $this->LaporanModel->get_penjualan()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'laporan/penjualan', $data);
        } else {
            $param = [
                'tgl_awal'  => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Penjualan',
                'penjualan' => $this->LaporanModel->filter_penjualan($param)->result()
            ];
            $this->template->load('layout/master', 'laporan/penjualan', $data);
        }
    }

    public function penitipan()
    {
        $data = [
            'title'     => 'Laporan Penitipan Peliharaan',
            'penitipan' => $this->LaporanModel->get_penitipan()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/master', 'laporan/penitipan', $data);
        } else {
            $param = [
                'tgl_awal'  => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Penitipan Peliharaan',
                'penitipan' => $this->LaporanModel->filter_penitipan($param)->result()
            ];
            $this->template->load('layout/master', 'laporan/penitipan', $data);
        }
    }

}

