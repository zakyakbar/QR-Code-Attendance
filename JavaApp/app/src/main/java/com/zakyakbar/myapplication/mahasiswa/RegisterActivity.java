package com.zakyakbar.myapplication.mahasiswa;


import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.SharedPrefManager;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {

    TextView etName, etNim;
    Button btnRegister;

    Context mContext;
    SharedPrefManager sharedPrefManager;

    private static String Name = "name";
    private static String Nim = "nim";
    private String responseToken;

    //  final String url_Register = "https://atifnaseem22.000webhostapp.com/register_user.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        sharedPrefManager = new SharedPrefManager(this);

        mContext = this;

        etName = (TextView) findViewById(R.id.etName);
        etName.setText(sharedPrefManager.getSPName());

        etNim = (TextView) findViewById(R.id.etNim);
        etNim.setText(sharedPrefManager.getSPNim());

        btnRegister = (Button) findViewById(R.id.bRegister);


        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                RegisterRequest();

            }
        });
    }

    private void RegisterRequest() {
        final String name = etName.getText().toString();
        final String nim = etNim.getText().toString();


        String url = getIntent().getStringExtra("SCAN_RESULT");

        StringRequest sR = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                if (response.equals("sukses")) {

                    Toast.makeText(RegisterActivity.this, "ABSEN BERHASIL", Toast.LENGTH_SHORT).show();
                } else {
                    Intent i = new Intent(RegisterActivity.this, SelesaiActivity.class);
                    startActivity(i);
                    finish();
                }


            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(RegisterActivity.this, "ABSEN GAGAL, QR CODE TIDAK VALID ! ", Toast.LENGTH_SHORT).show();
                      //  Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();

                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<String, String>();

                params.put(Name, name);
                params.put(Nim, nim);

                return params;
            }

        };

        RequestQueue queue = Volley.newRequestQueue(RegisterActivity.this);
        queue.add(sR);

    }
}

