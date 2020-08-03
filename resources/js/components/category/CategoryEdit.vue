    <template>
        <div>
            <div class="form-group">
                <router-link to="/" class="btn btn-default">Back</router-link>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Create new category</div>
                <div class="panel-body">
                    <form v-on:submit="saveForm()">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Category title</label>
                                <input type="text" v-model="category.title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Category slug</label>
                                <input type="text" v-model="category.slug" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <label class="control-label">Category</label>
                                <input type="text" v-model="category.cat_id" class="form-control">
                                <select v-model="selected">
                                    <!-- inline object literal -->
                                    <option v-for="item in parent" :value="item.id">
                                        {{item.title}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                <button class="btn btn-success">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>

    <script>
        export default {
            mounted() {
                let app = this;
                let id = app.$route.params.id;
                app.categoryId = id;
                axios.get('/api/v1/categories/' + id)
                    .then(function (resp) {
                        app.category = resp.data;
                    })
                    .catch(function () {
                        alert("Could not load your category")
                    });
            },
            data: function () {
                return {
                    categoryId: null,
                    category: {
                        title: '',
                        id: '',
                        slug: '',
                        cat_id: '',
                    }
                }
            },
            methods: {
                saveForm() {
                    event.preventDefault();
                    var app = this;
                    var newCategory = app.category;
                    axios.patch('/api/v1/categories/' + app.categoryId, newCategory)
                        .then(function (resp) {
                            app.$router.replace('/');
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not create your category");
                        });
                }
            }
        }
    </script>
