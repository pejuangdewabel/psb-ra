<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel Kelulusan Siswa</strong>
            </h3>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Pilih Tahun Ajaran</label>
                            <select
                                class="form-control"
                                v-model="pilihan"
                                @change="changePilihan()"
                            >
                                <option selected disabled>
                                    Pilih Tahun Ajaran
                                </option>
                                <option
                                    v-for="th in tahunkelulusan"
                                    :key="th.id"
                                    :value="th.id"
                                >
                                    {{ th.date1 + "/" + th.date2 }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <table
                                id="table-kelulusan"
                                class="table table-bordered table-striped"
                                v-show="kelulusan.length"
                            >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(k, index) in kelulusan"
                                        :key="k.id"
                                    >
                                        <td>
                                            {{ index + 1 }}
                                        </td>
                                        <td>
                                            {{
                                                k.th_ajaran.date1 +
                                                    "/" +
                                                    k.th_ajaran.date2
                                            }}
                                        </td>
                                        <td>
                                            {{ k.pendaftaran.relasi_user.nik }}
                                        </td>
                                        <td>
                                            {{ k.pendaftaran.relasi_user.nama }}
                                        </td>
                                        <td>{{ k.nama_kelas.kode_kelas }}</td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-danger btn-sm"
                                                data-placement="top"
                                                title="Untuk Membatalkan Kelulusan"
                                                @click="deleteData(k.id)"
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer"></div>
        <!-- /.card-footer-->
        <!-- Modal Pembagian Kelas -->
        <div
            class="modal fade"
            id="ChoiseClass"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Pembagian Kelas
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
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama_siswa"
                                id="nama_siswa"
                                value="Rani"
                                disabled
                            />
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select
                                class="form-control"
                                name="kode_kelas"
                                id="kode_kelas"
                            >
                                <option selected disabled>Pilih Kelas</option>
                                <option value="">1A</option>
                                <option value="">1B</option>
                                <option value="">1C</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            kelulusan: {},
            tahunkelulusan: {},
            pilihan: "",
            form: new Form({
                kode_kelas: "",
                kapasitas_kelas: ""
            })
        };
    },
    methods: {
        loadData() {
            axios
                .get("/api/tahun-ajaran")
                .then(({ data }) => {
                    this.tahunkelulusan = data;
                })
                .catch();
        },
        changePilihan() {
            axios
                .get("/api/kelulusan/" + this.pilihan)
                .then(({ data }) => {
                    this.kelulusan = data;
                    if (Object.keys(data).length == 0) {
                        Fire.$emit("refreshData");
                        Swal.fire({
                            icon: "error",
                            title: "Data Kosong"
                        });
                        Fire.$emit("refreshData");
                    } else {
                        Fire.$emit("refreshData");
                        Swal.fire({
                            icon: "success",
                            title: "Data Ditemukan"
                        });
                    }
                })
                .catch();
        },
        deleteData(k) {
            Swal.fire({
                title: "Apakah Anda Yakin untuk membatalkan kelulusan ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("/api/kelulusan/" + k)
                        .then(() => {
                            window.location.reload();
                            this.$forceUpdate();
                            Fire.$emit("refreshData");
                            Swal.fire(
                                "Terhapus",
                                "Data sudah Terhapus",
                                "success"
                            );
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
            Fire.$emit("refreshData");
        },
        chouseClass() {
            $("#ChoiseClass").modal("show");
        },
        closebtn() {
            $("#addModalKelas").modal("hide");
            this.form.errors.clear();
            this.form.reset();
        }
    },
    mounted() {
        Fire.$emit("refreshData");
    },
    created() {
        this.loadData();
        // laod Data
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    }
};
</script>
