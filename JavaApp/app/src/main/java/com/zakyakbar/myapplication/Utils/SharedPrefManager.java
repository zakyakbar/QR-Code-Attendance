package com.zakyakbar.myapplication.Utils;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;


public class SharedPrefManager {

    public static final String SP_MAHASISWA_APP = "spMahasiswaApp";

    public static final String LOGGED_IN_PREF = "logged_in_status";

    public static final String SP_NAME = "nama_mahasiswa";
    public static final String SP_NIM = "nim";
    public static final String SP_URL = "url";

    public static final String SP_DOSEN = "nama_dosen";

    public static final String SP_QRCODE = "qrcode";

    public static final String SP_SUDAH_LOGIN = "spSudahLogin";

    public static final String SP_DOSEN_LOGIN = "spDosenLogin";


    SharedPreferences sp;
    SharedPreferences.Editor spEditor;

    public SharedPrefManager(Context context) {
        sp = context.getSharedPreferences(SP_MAHASISWA_APP, Context.MODE_PRIVATE);
        spEditor = sp.edit();
    }

    static SharedPreferences getPreferences(Context context) {
        return PreferenceManager.getDefaultSharedPreferences(context);
    }

    public void saveSPString(String keySP, String value) {
        spEditor.putString(keySP, value);
        spEditor.commit();
    }

    public void saveSPInt(String keySP, int value) {
        spEditor.putInt(keySP, value);
        spEditor.commit();
    }

    public void saveSPBoolean(String keySP, boolean value) {
        spEditor.putBoolean(keySP, value);
        spEditor.commit();
    }

    public Boolean getSPSudahLogin(){
        return sp.getBoolean(SP_SUDAH_LOGIN, false);
    }

    public Boolean getSPDosenLogin(){
        return sp.getBoolean(SP_DOSEN_LOGIN, false);
    }

    public String getSPName() {
        return sp.getString(SP_NAME, "");
    }

    public String getSPDosen() {
        return sp.getString(SP_DOSEN, "");
    }

    public String getSPQrCode() {
        return sp.getString(SP_QRCODE, "");
    }

    public String getSPNim() {
        return sp.getString(SP_NIM, "");
    }

    public String getSPUrl() {
        return sp.getString(SP_URL, "");
    }

    public static void setLoggedIn(Context context, boolean loggedIn) {
        SharedPreferences.Editor editor = getPreferences(context).edit();
        editor.putBoolean(LOGGED_IN_PREF, loggedIn);
        editor.apply();
    }

    public static boolean getLoggedStatus(Context context) {
        return getPreferences(context).getBoolean(LOGGED_IN_PREF, false);
    }
}
