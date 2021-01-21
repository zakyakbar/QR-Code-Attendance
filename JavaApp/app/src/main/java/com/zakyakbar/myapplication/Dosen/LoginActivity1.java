package com.zakyakbar.myapplication.Dosen;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RelativeLayout;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.BaseApiService;
import com.zakyakbar.myapplication.Utils.SharedPrefManager;
import com.zakyakbar.myapplication.Utils.Utils;


import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity1 extends AppCompatActivity {

    EditText etEmail, etPassword;
    Button bLogin;
    RelativeLayout loginForm;


    Context mContext;
    BaseApiService baseApiService;

    SharedPrefManager sharedPrefManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);


        etEmail = (EditText) findViewById(R.id.etUsername);
        etPassword = findViewById(R.id.etPassword);
        bLogin = (Button) findViewById(R.id.bLogin);
        loginForm = findViewById(R.id.loginForm);


        mContext = this;
        baseApiService = Utils.getAPIService();
        sharedPrefManager = new SharedPrefManager(this);

        bLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                requestDosen();
            }
        });

       if (sharedPrefManager.getSPDosenLogin()){
        startActivity(new Intent(LoginActivity1.this, Splash1.class)
                .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
        finish();
    }
}

    private void requestDosen(){
        baseApiService.DosenRequest(etEmail.getText().toString(), etPassword.getText().toString())
                .enqueue(new Callback<ResponseBody>() {
                    @Override
                    public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                        if (response.isSuccessful()){

                            try {
                                JSONObject jsonRESULTS = new JSONObject(response.body().string());
                                if (jsonRESULTS.getString("error").equals("false")){

                                    Toast.makeText(mContext, "BERHASIL LOGIN", Toast.LENGTH_SHORT).show();

                                    String nama_dosen = jsonRESULTS.getJSONObject("user").getString("nama_dosen");
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_DOSEN, nama_dosen);

                                    String qrcode = jsonRESULTS.getJSONObject("user").getString("qrcode");
                                    sharedPrefManager.saveSPString(SharedPrefManager.SP_QRCODE, qrcode);

                                    sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_DOSEN_LOGIN, true);
                                    startActivity(new Intent(mContext, Splash1.class)
                                            .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                                    finish();
                                } else {
                                    String error_message = jsonRESULTS.getString("error_msg");
                                    Toast.makeText(mContext, error_message, Toast.LENGTH_SHORT).show();
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            } catch (IOException e) {
                                e.printStackTrace();
                            }
                        } else {
                            //  return;
                        }
                    }

                    @Override
                    public void onFailure(Call<ResponseBody> call, Throwable t) {
                        Log.e("debug", "onFailure: ERROR > " + t.toString());
                    }
                });
    }
}
