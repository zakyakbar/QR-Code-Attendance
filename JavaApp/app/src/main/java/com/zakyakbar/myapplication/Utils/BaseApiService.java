package com.zakyakbar.myapplication.Utils;

import com.zakyakbar.myapplication.Model.ResponseDosen;
import com.zakyakbar.myapplication.Model.ResponseMatkul;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface BaseApiService {

    @GET("apilogin/index.php/semuadosen")
    Call<ResponseDosen> getSemuaDosen();


    @GET("apilogin/index.php/matkul")
    Call<ResponseMatkul> getSemuaMatkul();

    @FormUrlEncoded
    @POST("apilogin/mahasiswa.php")
    Call<ResponseBody> MahasiswaRequest(@Field("email") String email, @Field("password") String password);

    @FormUrlEncoded
    @POST("apilogin/dosen.php")
    Call<ResponseBody> DosenRequest(@Field("email") String email, @Field("password") String password);
}