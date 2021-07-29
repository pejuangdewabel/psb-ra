<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel Admin</strong>
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
                                        Tambah Data Admin
                                    </h5>
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                        v-show="!statusModal"
                                    >
                                        Ubah Data Kelas
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
                                            <label for="">Username</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.username"
                                                placeholder="Username"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'username'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has('username')
                                                "
                                                v-html="
                                                    form.errors.get('username')
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.nama"
                                                placeholder="Nama"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'nama'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="form.errors.has('nama')"
                                                v-html="form.errors.get('nama')"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="form.password"
                                                placeholder="Password"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'password'
                                                    )
                                                }"
                                            />
                                            <div
                                                class="badge badge-danger"
                                                v-if="
                                                    form.errors.has('password')
                                                "
                                                v-html="
                                                    form.errors.get('password')
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(admin, index) in admins"
                                :key="admin.id"
                            >
                                <td>{{ index + 1 }}</td>
                                <td>{{ admin.username }}</td>
                                <td>{{ admin.nama }}</td>
                                <td>{{ format_date(admin.created_at) }}</td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-primary btn-sm"
                                        @click="showModalEdit(admin)"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        @click="deleteData(admin.id)"
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
            admins: {},
            statusModal: false,
            form: new Form({
                id: "",
                username: "",
                nama: "",
                password: ""
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
                .get("/api/admin")
                .then(({ data }) => {
                    this.admins = data;
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
            this.form.fill(k);
        },
        ubahData() {
            this.loading = true;
            this.disabled = true;
            this.form
                .put("/api/admin/" + this.form.id)
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
                .post("/api/admin")
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
                        .delete("/api/admin/" + id)
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
    created() {
        this.loadData();
        // laod Data
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    }
};
</script>
