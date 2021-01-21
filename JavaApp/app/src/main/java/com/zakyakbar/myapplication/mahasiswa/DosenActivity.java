package com.zakyakbar.myapplication.mahasiswa;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.zakyakbar.myapplication.Adapter.DosenAdapter;
import com.zakyakbar.myapplication.Model.ResponseDosen;
import com.zakyakbar.myapplication.Model.SemuadosenItem;
import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.BaseApiService;
import com.zakyakbar.myapplication.Utils.Utils;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DosenActivity extends AppCompatActivity {

    RecyclerView rvDosen;
    ProgressDialog loading;

    Context mContext;
    List<SemuadosenItem> semuadosenItemList = new ArrayList<>();
    DosenAdapter dosenAdapter;
    BaseApiService mApiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dosen);

        rvDosen = (RecyclerView) findViewById(R.id.rvDosen);
        mContext = this;
        mApiService = Utils.getAPIService();

        dosenAdapter = new DosenAdapter(this, semuadosenItemList);
        RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(this);
        rvDosen.setLayoutManager(mLayoutManager);
        rvDosen.setItemAnimator(new DefaultItemAnimator());

        getResultListDosen();
    }

    private void getResultListDosen(){
        loading = ProgressDialog.show(this, null, "Tunggu Sebentar ...", true, false);

        mApiService.getSemuaDosen().enqueue(new Callback<ResponseDosen>() {
            @Override
            public void onResponse(Call<ResponseDosen> call, Response<ResponseDosen> response) {
                if (response.isSuccessful()){
                    loading.dismiss();

                    final List<SemuadosenItem> semuaDosenItems = response.body().getSemuadosen();

                    rvDosen.setAdapter(new DosenAdapter(mContext, semuaDosenItems));
                    dosenAdapter.notifyDataSetChanged();
                } else {
                    loading.dismiss();
                    Toast.makeText(mContext, "Gagal Mengambil Data Dosen ", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseDosen> call, Throwable t) {
                loading.dismiss();
                Toast.makeText(mContext, "Cek Koneksi Internet Anda !", Toast.LENGTH_SHORT).show();
            }
        });
    }
}