<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel Pendaftar</strong>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3"></div>
                <div class="col-md-12">
                    <table
                        id="table-kelas1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pendaftaran</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(s, index) in siswa" :key="s.id">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ s.no_pendaftaran }}
                                </td>
                                <td>
                                    {{ s.relasi_user.nik }}
                                </td>
                                <td>
                                    {{ s.relasi_user.nama }}
                                </td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-primary btn-sm"
                                        @click="changeStatusModal(s)"
                                        data-placement="top"
                                        title="Diterima"
                                    >
                                        <i class="fas fa-check-square"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-warning btn-sm"
                                        @click="tolak(s)"
                                        data-placement="top"
                                        title="Ditolak"
                                    >
                                        <i class="fas fa-minus-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-info btn-sm"
                                        @click="tampilDetail(s.no_pendaftaran)"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-warning btn-sm"
                                        @click="berkasView(s.no_pendaftaran)"
                                    >
                                        <i class="fas fa-image"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        @click="deleteData(s.no_pendaftaran)"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer"></div>
        <!-- /.card-footer-->

        <!-- Modal View Detail-->
        <div
            class="modal fade"
            id="viewModalPendaftar"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-scrollable">
                <div
                    class="modal-content"
                    v-for="d in detail"
                    :key="d.no_pendaftaran"
                >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Detail Pendaftaran
                            <br />
                            <span class="badge badge-primary">
                                {{ d.no_pendaftaran }} |
                                {{ d.relasi_user.nama }}
                            </span>
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td>No Pendaftaran</td>
                                <td>:</td>
                                <td>{{ d.no_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ d.relasi_user.nama }}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{ d.relasi_user.nik }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>
                                    {{ format_date(d.tgl_lahir_siswa) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td>
                                    {{ d.tmpt_lahir_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    {{ d.jk_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>
                                    {{ d.agama_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status Anak</td>
                                <td>:</td>
                                <td>
                                    {{ d.status_anak_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke -</td>
                                <td>:</td>
                                <td>
                                    {{ d.anak_ke }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Saudara</td>
                                <td>:</td>
                                <td>
                                    {{ d.jml_saudara }}
                                </td>
                            </tr>
                            <tr>
                                <td>Bahasa yang digunakan</td>
                                <td>:</td>
                                <td>
                                    {{ d.bahasa_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    {{ d.alamat_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kota / Kabupaten</td>
                                <td>:</td>
                                <td>
                                    {{ d.kabupaten_kota_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>
                                    {{ d.provinsi_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kode Post</td>
                                <td>:</td>
                                <td>
                                    {{ d.kode_pos_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>
                                    {{ d.no_hp_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ d.nama_ayah_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ format_date(d.tgl_lahir_ayah) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ d.pekerjaan_ayah_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>No Telp Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ d.nohp_ayah_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ d.penghasilan_ayah_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ayah</td>
                                <td>:</td>
                                <td>
                                    {{ d.pendidikan_ayah_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ d.nama_ibu_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ format_date(d.tgl_lahir_ibu) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ d.pekerjaan_ibu_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>No Telp Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ d.nohp_ibu_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ d.penghasilan_ibu_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu</td>
                                <td>:</td>
                                <td>
                                    {{ d.pendidikan_ibu_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Orang Tua</td>
                                <td>:</td>
                                <td>
                                    {{ d.alamat_ortu }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.nama_wali_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Wali</td>
                                <td>:</td>
                                <td>
                                    {{ format_date(d.tgl_lahir_wali) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.pekerjaan_wali_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>No Telp Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.nohp_wali_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.penghasilan_wali_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.pendidikan_wali_siswa }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Orang Wali</td>
                                <td>:</td>
                                <td>
                                    {{ d.alamat_wali }}
                                </td>
                            </tr>
                            <tr>
                                <td>Akte Kelahiran</td>
                                <td>:</td>
                                <td
                                    v-if="
                                        d.akte ==
                                            'http://127.0.0.1:8000/storage'
                                    "
                                    class="text-danger"
                                >
                                    <i class="fas fa-times"></i>
                                </td>
                                <td class="text-success" v-else>
                                    <i class="fas fa-check"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Kartu Keluarga</td>
                                <td>:</td>
                                <td
                                    v-if="
                                        d.kk == 'http://127.0.0.1:8000/storage'
                                    "
                                    class="text-danger"
                                >
                                    <i class="fas fa-times"></i>
                                </td>
                                <td class="text-success" v-else>
                                    <i class="fas fa-check"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Pas Foto</td>
                                <td>:</td>
                                <td
                                    v-if="
                                        d.foto ==
                                            'http://127.0.0.1:8000/storage'
                                    "
                                    class="text-danger"
                                >
                                    <i class="fas fa-times"></i>
                                </td>
                                <td class="text-success" v-else>
                                    <i class="fas fa-check"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer text-left">
                        <!-- <a href="#" class="btn btn-primary text-white">
                            <i class="far fa-check-circle"></i>
                            DITERIMA
                        </a>
                        |
                        <a href="#" class="btn btn-danger text-white">
                            <i class="far fa-times-circle"></i>
                            DITOLAK
                        </a> -->
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeDetail()"
                        >
                            <i class="fas fa-door-open"></i>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Berkas -->
        <div class="modal fade" id="modalBerkas">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div
                    class="modal-content"
                    v-for="b in berkas"
                    :key="b.no_pendaftaran"
                >
                    <div class="modal-header">
                        <h5 class="modal-title">
                            BERKAS
                            <br />
                            <span class="badge badge-primary">
                                {{ b.no_pendaftaran }} |
                                {{ b.relasi_user.nama }}
                            </span>
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <table class="table">
                            <tr>
                                <h5>
                                    <strong> Pas Foto </strong>
                                </h5>
                            </tr>
                            <tr>
                                <img
                                    class="img-thumbnail"
                                    :src="b.foto"
                                    alt="contoh-pas-foto"
                                />
                            </tr>
                            <br />
                            <br />
                            <tr>
                                <h5>
                                    <strong> Akte Kelahiran </strong>
                                </h5>
                            </tr>
                            <tr>
                                <img
                                    :src="b.akte"
                                    alt="akta-kelahiran"
                                    class="img-thumbnail"
                                />
                            </tr>
                            <br />
                            <br />
                            <tr>
                                <h5>
                                    <strong> Kartu Keluarga</strong>
                                </h5>
                            </tr>
                            <tr>
                                <img
                                    :src="b.kk"
                                    alt="kartu-keluarga"
                                    class="img-thumbnail"
                                />
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button
                            type="button"
                            class="btn btn-info btn-sm"
                            data-dismiss="modal"
                        >
                            Keluar
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Modal Change Status Kelulusan-->
        <div
            class="modal fade"
            id="kelulusan"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Konfirmasi Kelulusan
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.passive="changeStatus()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">No Pendaftaran</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.no_pendaftaran"
                                    disabled
                                />
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Ajaran</label>
                                <select
                                    v-model="form.tahunajaran"
                                    class="form-control"
                                >
                                    <option
                                        v-for="t in thnajaran"
                                        :key="t.id"
                                        :value="t.id"
                                    >
                                        {{ t.date1 + "/" + t.date2 }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select
                                    v-model="form.nama_kelas"
                                    class="form-control"
                                >
                                    <option
                                        v-for="k in kelas"
                                        :key="k.kode_kelas"
                                        :value="k.kode_kelas"
                                    >
                                        {{ k.kode_kelas }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                @click="closebtn()"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i
                                    v-show="loading"
                                    class="fas fa-spinner fa-spin"
                                ></i>
                                Konfirmasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Change Ditolak -->
        <div
            class="modal fade"
            id="ditolak"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Konfirmasi Ditolak
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.passive="tolakAction()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">No Pendaftaran</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.no_pendaftaran"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                @click="closebtn()"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i
                                    v-show="loading"
                                    class="fas fa-spinner fa-spin"
                                ></i>
                                Konfirmasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            siswa: {},
            detail: {},
            berkas: {},
            kelas: {},
            thnajaran: {},
            statusModal: false,
            form: new Form({
                tahunajaran: "",
                no_pendaftaran: "",
                nama_kelas: "",
                status_kelulusan: ""
            })
        };
    },
    methods: {
        format_date(value) {
            if (value) {
                return moment(String(value)).format("DD-MM-YYYY");
            }
        },
        loadData() {
            axios
                .get("/api/pendaftar")
                .then(({ data }) => {
                    this.siswa = data;
                })
                .catch();
            axios
                .get("/api/kelas")
                .then(({ data }) => {
                    this.kelas = data;
                })
                .catch();
            axios
                .get("/api/tahun-ajaran")
                .then(({ data }) => {
                    this.thnajaran = data;
                })
                .catch();
        },
        showModal() {
            this.statusModal = true;
            this.form.reset();
            $("#addModalKelas").modal("show");
        },
        tampilDetail(nopendaftaran) {
            axios
                .get("/api/pendaftar/" + nopendaftaran)
                .then(({ data }) => {
                    this.detail = data;
                })
                .catch();
            $("#viewModalPendaftar").modal("show");
        },
        closeDetail() {
            this.detail = {};
            $("#viewModalPendaftar").modal("hide");
        },
        berkasView(nopendaftaran) {
            axios
                .get("/api/pendaftar/" + nopendaftaran)
                .then(({ data }) => {
                    this.berkas = data;
                })
                .catch();
            $("#modalBerkas").modal("show");
        },
        changeStatusModal(s) {
            $("#kelulusan").modal("show");
            this.form.fill(s);
        },
        tolak(s) {
            $("#ditolak").modal("show");
            this.form.fill(s);
        },
        tolakAction() {
            Swal.fire({
                title:
                    "Apakah anda yakin untuk ditolak? (Data tidak Bisa diubah bila sudah disimpan)",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya , Yakin"
            }).then(result => {
                if (result.value) {
                    this.form
                        .post("/api/pendaftar/")
                        .then(() => {
                            Fire.$emit("refreshData");
                            $("#ditolak").modal("hide");
                            Toast.fire({
                                icon: "success",
                                title: "Data Berhasil Disimpan"
                            });
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Disimpan",
                                "warning"
                            );
                        });
                }
            });
        },
        changeStatus() {
            Swal.fire({
                title:
                    "Apakah anda yakin ? (Data tidak Bisa diubah bila sudah disimpan)",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya , Yakin"
            }).then(result => {
                if (result.value) {
                    this.form
                        .put("/api/pendaftar/" + this.form.no_pendaftaran)
                        .then(() => {
                            Fire.$emit("refreshData");
                            $("#kelulusan").modal("hide");
                            Toast.fire({
                                icon: "success",
                                title: "Data Berhasil Disimpan"
                            });
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data Gagal Disimpan",
                                "warning"
                            );
                        });
                }
            });
        },
        showModalEdit(k) {
            // this.statusModal = false;
            this.form.reset();
            $("#kelulusan").modal("show");
            this.form.fill(k);
        },
        deleteData(id) {
            Swal.fire({
                title: "Apakah Anda Yakin untuk menghapus data ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("/api/pendaftar/" + id)
                        .then(() => {
                            Swal.fire(
                                "Terhapus",
                                "Data sudah Terhapus",
                                "success"
                            );
                            Fire.$emit("refreshData");
                        })
                        .catch(() => {
                            Swal.fire(
                                "Gagal",
                                "Data gagal Terhapus",
                                "warning"
                            );
                        });
                }
            });
        },
        closebtn() {
            $("#kelulusan").modal("hide");
            $("#ditolak").modal("hide");
            this.form.errors.clear();
            this.form.reset();
        }
    },
    mounted() {},
    created() {
        this.loadData();
        // laod Data
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    }
};
</script>
