<template>
    <div>
        <h3 class="text-center">Editar Produto</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="editProduto">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="item.nome">
                    </div>
                    <div class="form-group">
                        <label>Preços</label>
                        <input type="text" class="form-control" v-model="item.precos">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                item: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/items/${this.$route.params.id}`)
                .then((res) => {
                    this.item = res.data;
                });
        },
        methods: {
            editProduto() {
                this.axios
                    .patch(`http://localhost:8000/api/items/${this.$route.params.id}`, this.item)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>