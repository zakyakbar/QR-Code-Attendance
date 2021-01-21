package com.zakyakbar.myapplication.Model;

import com.google.gson.annotations.SerializedName;

public class ResponseDosenDetail{

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

    @SerializedName("error")
    private boolean error;

    @SerializedName("message")
    private String message;

    public void setNip(String nip){
        this.nip = nip;
    }

    public String getNip(){
        return nip;
    }

    public void setNama_Dosen(String nama_dosen){
        this.nama_dosen = nama_dosen;
    }

    public String getNama_Dosen(){ return nama_dosen; }

    public void setEmail(String email){
        this.email = email;
    }

    public String getEmail(){
        return email;
    }

    public void setKontak_dosen (String kontak_dosen){
        this.kontak_dosen = kontak_dosen;
    }

    public String getKontak_dosen(){ return kontak_dosen; }

    public void setAlamat(String alamat){
        this.alamat = alamat;
    }

    public String getAlamat(){ return alamat; }

    public void setError(boolean error){
        this.error = error;
    }

    public boolean isError(){
        return error;
    }

    public void setMessage(String message){
        this.message = message;
    }

    public String getMessage(){
        return message;
    }


    @Override
    public String toString(){
        return
                "ResponseDosenDetail{" +
                        "nip = '" + nip + '\'' +
                        ",nama_dosen = '" + nama_dosen + '\'' +
                        ",email = '" + email + '\'' +
                        ",kontak_dosen = '" + kontak_dosen + '\'' +
                        ",alamat = '" + alamat + '\'' +
                        ",error = '" + error + '\'' +
                        ",message = '" + message + '\'' +
                        "}";
    }
}