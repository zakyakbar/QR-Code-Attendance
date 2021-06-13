package com.zakyakbar.myapplication.Model;

import com.google.gson.annotations.SerializedName;

public class SemuamatkulItem{

    @SerializedName("id_mk")
    private String id_mk;

    @SerializedName("nama_matkul")
    private String nama_matkul;

    @SerializedName("semester")
    private String semester;

    @SerializedName("nama_dosen")
    private String nama_dosen;


    public void setId_mk(String id_mk){
        this.id_mk = id_mk;
    }

    public String getId_mk(){
        return id_mk;
    }

    public void setNama_Matkul(String nama_matkul){
        this.nama_matkul = nama_matkul;
    }

    public String getNama_Matkul(){
        return nama_matkul;
    }

    public void setSemester(String semester){
        this.semester = semester;
    }

    public String getSemester(){
        return semester;
    }

    public void setNama_Dosen(String nama_dosen){
        this.nama_dosen = nama_dosen;
    }

    public String getNama_Dosen(){
        return nama_dosen;
    }

    @Override
    public String toString(){
        return
                "SemuamatkulItem{" +
                        "id_mk = '" + id_mk + '\'' +
                        ",nama_matkul = '" + nama_matkul + '\'' +
                        ",semester = '" + semester + '\'' +
                        ",nama_dosen = '" + nama_dosen + '\'' +
                        "}";
    }
}