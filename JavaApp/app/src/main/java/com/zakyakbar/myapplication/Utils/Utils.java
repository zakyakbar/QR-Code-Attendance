package com.zakyakbar.myapplication.Utils;

public class Utils {

    public static final String BASE_URL_API = "http://192.168.43.185/api/";

    //public static final String URL_API = "http://192.168.43.185/apiabsen/";

    public static BaseApiService getAPIService(){
        return RetrofitClient.getClient().create(BaseApiService.class);
    }
}
