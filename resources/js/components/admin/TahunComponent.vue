<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel Tahun Ajaran</strong>
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
                                        Tambah Data Tahun Ajaran
                                    </h5>
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                        v-show="!statusModal"
                                    >
                                        Ubah Data Tahun Ajaran
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
                                            <label for="">Tahun Awal</label>
                                            <input
                                                type="number"
                                                class="form-control date-own"
                                                v-model="form.date1"
                                                id="date1"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date1'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="form.errors.has('date1')"
                                                v-html="
                                                    form.errors.get('date1')
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Akhir</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                v-model="form.date2"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date2'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="form.errors.has('date2')"
                                                v-html="
                                                    form.errors.get('date2')
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(t, index) in kelass" :key="t.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ t.date1 + "/" + t.date2 }}</td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-primary btn-sm"
                                        @click="showModalEdit(t)"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        @click="deleteData(t.id)"
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
export default {
    data() {
        return {
            loading: false,
            disabled: false,
            kelass: {},
            statusModal: false,
            form: new Form({
                id: "",
                date1: "",
                date2: ""
            })
        };
    },
    methods: {
        loadData() {
            axios
                .get("/api/tahun-ajaran")
                .then(({ data }) => {
                    this.kelass = data;
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
                .put("/api/tahun-ajaran/" + this.form.id)
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
                .post("/api/tahun-ajaran")
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
                        .delete("/api/tahun-ajaran/" + id)
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
