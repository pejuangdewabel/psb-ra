<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel Informasi Pengumuman Pendaftaran</strong>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <a
                        href="#"
                        class="btn btn-primary btn-sm"
                        @click="showModal()"
                    >
                        <i class="fas fa-plus-circle"></i>
                        Tambah Data
                    </a>
                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="addModalKelas"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                        v-show="statusModal"
                                    >
                                        Tambah Data Pengumuman
                                    </h5>
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                        v-show="!statusModal"
                                    >
                                        Ubah Data Pengumuman
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
                                <form
                                    @submit.passive="
                                        statusModal ? postData() : ubahData()
                                    "
                                >
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Tahun Ajaran</label>
                                            <select
                                                class="form-control"
                                                v-model="form.id_thn_ajaran"
                                                id="id_thn_ajaran"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'id_thn_ajaran'
                                                    )
                                                }"
                                            >
                                                <option selected disabled
                                                    >Pilih Tahun Ajaran</option
                                                >
                                                <option
                                                    v-for="t in thunajaran"
                                                    :key="t.id"
                                                    :value="t.id"
                                                >
                                                    {{
                                                        t.date1 + "/" + t.date2
                                                    }}
                                                </option>
                                            </select>
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'id_thn_ajaran'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'id_thn_ajaran'
                                                    )
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for=""
                                                >Tanggal Pendaftaran
                                                Dimulai</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control date-own"
                                                v-model="form.pendaftaran_awal"
                                                id="pendaftaran_awal"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'pendaftaran_awal'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'pendaftaran_awal'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'pendaftaran_awal'
                                                    )
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Akhir</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                v-model="form.pendaftaran_akhir"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'pendaftaran_akhir'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'pendaftaran_akhir'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'pendaftaran_akhir'
                                                    )
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pengumuman</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                v-model="form.pengumuman"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'pengumuman'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'pengumuman'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'pengumuman'
                                                    )
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pengumuman</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                v-model="form.daftar_ulang_awal"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'daftar_ulang_awal'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'daftar_ulang_awal'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'daftar_ulang_awal'
                                                    )
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for=""
                                                >Daftar Ulang Mulai</label
                                            >
                                            <input
                                                type="date"
                                                class="form-control"
                                                v-model="
                                                    form.daftar_ulang_akhir
                                                "
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'daftar_ulang_akhir'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has(
                                                        'daftar_ulang_akhir'
                                                    )
                                                "
                                                v-html="
                                                    form.errors.get(
                                                        'daftar_ulang_akhir'
                                                    )
                                                "
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
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            :disabled="disabled"
                                            v-show="statusModal"
                                        >
                                            <i
                                                v-show="loading"
                                                class="fas fa-spinner fa-spin"
                                            ></i>
                                            Simpan Data
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                            :disabled="disabled"
                                            v-show="!statusModal"
                                        >
                                            <i
                                                v-show="loading"
                                                class="fas fa-spinner fa-spin"
                                            ></i>
                                            Ubah Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <table
                        id="table-kelas1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Pendaftaran</th>
                                <th>Pengumuman</th>
                                <th>Daftar Ulang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(i, index) in informasi" :key="i.id">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ i.tahun.date1 + "/" + i.tahun.date2 }}
                                </td>
                                <td>
                                    {{
                                        format_date(i.pendaftaran_awal) +
                                            "" +
                                            "-" +
                                            "" +
                                            format_date(i.pendaftaran_akhir)
                                    }}
                                </td>
                                <td>
                                    {{ format_date(i.pengumuman) }}
                                </td>
                                <td>
                                    {{
                                        format_date(i.daftar_ulang_awal) +
                                            " " +
                                            "-" +
                                            " " +
                                            format_date(i.daftar_ulang_awal)
                                    }}
                                </td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-primary btn-sm"
                                        @click="showModalEdit(i)"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        @click="deleteData(i.id)"
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
    </div>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            informasi: {},
            statusModal: false,
            thunajaran: {},
            form: new Form({
                id: "",
                id_thn_ajaran: "",
                pendaftaran_awal: "",
                pendaftaran_akhir: "",
                pengumuman: "",
                daftar_ulang_awal: "",
                daftar_ulang_akhir: "",
                tahun: {}
            })
        };
    },
    methods: {
        format_date(value) {
            if (value) {
                return moment(String(value)).format("DD/MM/YYYY");
            }
        },
        loadData() {
            axios
                .get("/api/informasi")
                .then(({ data }) => {
                    this.informasi = data;
                })
                .catch();
            axios
                .get("/api/tahun-ajaran")
                .then(({ data }) => {
                    this.thunajaran = data;
                })
                .catch();
        },
        showModal() {
            this.statusModal = true;
            this.form.reset();
            $("#addModalKelas").modal("show");
        },
        showModalEdit(k) {
            this.statusModal = false;
            this.form.reset();
            $("#addModalKelas").modal("show");
            $("#addModalKelas").attr("readonly");
            this.form.fill(k);
        },
        ubahData() {
            this.loading = true;
            this.disabled = true;
            this.form
                .put("/api/informasi/" + this.form.id)
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#addModalKelas").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil Diubah"
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(() => {
                    this.loading = false;
                    this.disabled = false;
                });
        },
        postData() {
            this.loading = true;
            this.disabled = true;
            this.form
                .post("/api/informasi")
                .then(() => {
                    Fire.$emit("refreshData");
                    $("#addModalKelas").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil Disimpan"
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(() => {
                    this.loading = false;
                    this.disabled = false;
                });
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
                        .delete("/api/informasi/" + id)
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
            $("#addModalKelas").modal("hide");
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
