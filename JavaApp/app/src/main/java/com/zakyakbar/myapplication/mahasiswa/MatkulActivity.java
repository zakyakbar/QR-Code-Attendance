package com.zakyakbar.myapplication.mahasiswa;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.zakyakbar.myapplication.Adapter.MatkulAdapter;
import com.zakyakbar.myapplication.Model.ResponseMatkul;
import com.zakyakbar.myapplication.Model.SemuamatkulItem;
import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.BaseApiService;
import com.zakyakbar.myapplication.Utils.Utils;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MatkulActivity extends AppCompatActivity {

    TextView tvBelumMatkul;
    RecyclerView rvMatkul;
    ProgressDialog loading;

    Context mContext;
    List<SemuamatkulItem> semuamatkulItemList = new ArrayList<>();
    MatkulAdapter matkulAdapter;
    BaseApiService mApiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_matkul);

        rvMatkul = (RecyclerView) findViewById(R.id.rvMatkul);

        mApiService = Utils.getAPIService();
        mContext = this;

        matkulAdapter = new MatkulAdapter(this, semuamatkulItemList);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(this);
        rvMatkul.setLayoutManager(mLayoutManager);
        rvMatkul.setItemAnimator(new DefaultItemAnimator());

        getDataMatkul();

    }

    private void getDataMatkul(){
        loading = ProgressDialog.show(mContext, null, "Harap Tunggu...", true, false);
        mApiService.getSemuaMatkul().enqueue(new Callback<ResponseMatkul>() {
            @Override
            public void onResponse(Call<ResponseMatkul> call, Response<ResponseMatkul> response) {
                if (response.isSuccessful()) {
                    loading.dismiss();

                        final List<SemuamatkulItem> semuamatkulItems = response.body().getSemuamatkul();
                        rvMatkul.setAdapter(new MatkulAdapter(mContext, semuamatkulItems));
                        matkulAdapter.notifyDataSetChanged();


                } else {
                    loading.dismiss();
                    Toast.makeText(mContext, "Gagal Mengambil Data Mata kuliah", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseMatkul> call, Throwable t) {
                loading.dismiss();
                Toast.makeText(mContext, "Cek Koneksi Internet Anda !", Toast.LENGTH_SHORT).show();
            }
        });
    }

}
