package com.zakyakbar.myapplication.Model;

import com.google.gson.annotations.SerializedName;

public class SemuadosenItem{

    @SerializedName("nip")
    private String nip;

    @SerializedName("nama_dosen")
    private String nama_dosen;

    @SerializedName("email")
    private String email;

    @SerializedName("kontak_dosen")
    private String kontak_dosen;

    @SerializedName("alamat")
    private String alamat;

    public void setNip (String nip){
        this.nip = nip;
    }

    public String getNip(){
        return nip;
    }

    public void setNama_Dosen(String nama_dosen){
        this.nama_dosen = nama_dosen;
    }

    public String getNama_Dosen(){
        return nama_dosen;
    }

    public void setEmail(String email){
        this.email = email;
    }

    public String getEmail(){
        return email;
    }

    public void setAlamat(String alamat){ this.alamat = alamat; }

    public String getAlamat(){
        return alamat;
    }

    public void setKontak_Dosen(String kontak_dosen){
        this.kontak_dosen = kontak_dosen;
    }

    public String getKontak_Dosen(){
        return kontak_dosen;
    }


    @Override
    public String toString(){
        return
                "SemuadosenItem{" +
                        "nip = '" + nip + '\'' +
                        ",nama_dosen = '" + nama_dosen + '\'' +
                        ",email = '" + email + '\'' +
                        ",kontak_dosen = '" + kontak_dosen + '\'' +
                        ",alamat = '" + alamat + '\'' +
                        "}";
    }

}
