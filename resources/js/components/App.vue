<template lang="">
    <div>
        <div class="container mt-2">
            <h2 class="text-center text-uppercase">
                <b><u>User Information</u></b>
            </h2>
            <form @submit.prevent="insertData" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-4 mt-2">
                        <label for=""><b>Name</b></label>
                    </div>
                    <div class="col-md-8 mt-2">
                        <input
                            type="text"
                            name="name"
                            v-model="form.name"
                            class="form-control"
                            id="exampleInputPassword1"
                        />
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for=""><b>Email</b></label>
                    </div>
                    <div class="col-md-8 mt-2">
                        <input
                            type="email"
                            name="email"
                            v-model="form.email"
                            class="form-control"
                            id="exampleInputPassword1"
                        />
                    </div>

                    <div class="col-md-4 mt-2">
                        <label for=""><b>Image</b></label>
                    </div>
                    <div class="col-md-8 mt-2">
                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            @change="uploadPhoto"
                            id="exampleInputPassword1"
                        />
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for=""><b>Gender</b></label>
                    </div>
                    <div class="col-md-8 mt-2">
                        <div class="col-md-4 form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="inlineRadioOptions"
                                v-model="form.gender"
                                id="inlineRadio1"
                                value="male"
                            />
                            <label class="form-check-label" for="inlineRadio1"
                                >Male</label
                            >
                        </div>
                        <div class="col-md-4 form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                v-model="form.gender"
                                name="inlineRadioOptions"
                                id="inlineRadio2"
                                value="female"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Female</label
                            >
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for=""><b>Skills</b></label>
                    </div>
                    <div class="col-md-8 mt-2 d-flex">
                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="laravel"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Laravel</label
                            >
                        </div>

                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="codeigniter"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Codeigniter</label
                            >
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-8 d-flex">
                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="ajax"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Ajax</label
                            >
                        </div>
                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="vuejs"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Vue Js</label
                            >
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-8 d-flex">
                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="mysql"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Mysql</label
                            >
                        </div>
                        <div class="col-md-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="gridCheck"
                                name="skills[]"
                                v-model="form.skills"
                                value="api"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                                >Api</label
                            >
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button
                            type="submit"
                            class="btn btn-primary float-right"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <hr />
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in tabledata.data" :key="item.id">
                        <th scope="row">{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>
                            <img
                                :src="`${item.image}`"
                                class="profile-user-img img-fluid img-circle"
                                style="height: 40px; width: 40px"
                            />
                        </td>
                        <td>{{ item.gender }}</td>
                        <td>{{ item.skills }}</td>
                        <td>
                            <a
                                class="btn btn-sm btn-success"
                                href=""
                                @click.prevent="editInfo(item.id)"
                                >Edit</a
                            >
                            <a
                                class="btn btn-sm btn-danger ml-2"
                                href="#"
                                @click.prevent="deleteInfo(item.id)"
                                >Delete</a
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            tabledata: {},
            errors: {},
            form: {
                name: null,
                email: null,
                gender: null,
                skills: [],
                image: null,
            },
        };
    },
    created() {
        //LoadTableData
        this.loadTableData();
    },
    methods: {
        uploadPhoto(e) {
            let file = e.target.files[0];
            if (file.size > 2111775) {
                alert("File size can not be bigger than 2 MB");
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.image = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        // get Table data
        loadTableData() {
            axios
                .get("http://127.0.0.1:8000/info")
                .then(({ data }) => (this.tabledata = data))
                .catch(() => {
                    console.log("Error...");
                });
        },
        insertData() {
            axios
                .post("http://127.0.0.1:8000/info", this.form)
                .then(() => {
                    alert("Information Uploaded");
                    this.loadTableData();
                    this.form = "";
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
        editInfo(id) {
            axios
                .get(`http://127.0.0.1:8000/info/${id}`)
                .then(({ data }) => (this.form = data))
                .catch(() => {
                    console.log("Error...");
                });
        },

        deleteInfo(id) {
            axios
                .delete(`http://127.0.0.1:8000/info/${id}`)
                .then(() => {
                    alert("Information Deletd");
                    this.loadTableData();
                })
                .catch(() => {
                    console.log("Error...");
                });
        },

        updateData(id) {
            axios
                .put(`http://127.0.0.1:8000/info/${id}`, this.form)
                .then(() => {
                    alert("Information Updated");
                    this.loadTableData();
                    this.form = "";
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>
<style lang=""></style>
