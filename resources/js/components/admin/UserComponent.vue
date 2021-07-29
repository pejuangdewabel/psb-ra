<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">
                <strong>Data Tabel User</strong>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
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
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="user.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.nik }}</td>
                                <td>{{ user.nama }}</td>
                                <td>{{ format_date(user.created_at) }}</td>
                                <td>
                                    <a
                                        href="#"
                                        class="btn btn-danger btn-sm"
                                        @click="deleteData(user.id)"
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
            users: {},
            statusModal: false,
            form: new Form({
                kode_kelas: "",
                kapasitas_kelas: ""
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
                .get("/api/user")
                .then(({ data }) => {
                    this.users = data;
                })
                .catch();
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
                        .delete("/api/user/" + id)
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
