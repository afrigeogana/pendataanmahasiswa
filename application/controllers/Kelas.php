<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Kelas extends CI_Controller

{//tambah Construct
    public function __construct() {
        parent::__construct();
    $this->load->model(array("m_kelas"));
    $this->load->helper(array("currency"));
    }
    public function index()
    {
        //$data["datakelas"] = $this->db->get("masterkelas")->result();
        $data ['datakelas']=$this->m_kelas->getkelas()->result ();
        // $this->load->view("kelas/datakelas", $data);
        $data ["content"]="kelas/datakelas";
        $this->load->view("layouts/index", $data);
    }
    public function tambah()
    {
        $data ["content"]="kelas/tambahkelas";
        $this->load->view("layouts/index", $data);
    }
    public function simpantambah()
    {
        $postData = $this->input->post();
        unset($postData['submit']);
        $this->m_kelas->savekelas($postData);
        redirect(site_url("kelas"));
    }
    public function hapus()
    {
        $where['id'] = $this->uri->segment(3);
        $this->m_kelas->deletekelas($where);
        redirect(site_url("kelas"));
    }
    public function edit()
    {
        $where['id'] = $this->uri->segment(3);
        $data["datakelas"] = $this->m_kelas->getsinglekelas($where)->row();
        $data["content"]="kelas/editkelas";
        $this->load->view("layouts/index", $data);
    }
    public function simpanedit()
    {
        $postData = $this->input->post();
        $where['id'] = $postData['id'];
        unset ($postData["submit"], $postData["id"]);
        // $this->db->where($where)->update("masterkelas", $postData);
        $this->m_kelas->updatekelas ($where,$postData);
        redirect (site_url("kelas"));
    }
}
