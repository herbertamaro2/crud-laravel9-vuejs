<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="item.nome">
                    </div>
                    <div class="form-group">
                        <label>Ano</label>
                        <input type="text" class="form-control" v-model="item.preco.ano">
                    </div>
                    <div class="form-group">
                        <label>Preços</label>
                        <input type="text" class="form-control" v-model="item.preco.preco">
                    </div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                item: {nome: '', preco: {ano: '', preco: ''}}
            }
        },
        methods: {
            addProduct() {
               // this.item.preco = this.item.preco;
               // this.item.preco = Object.keys(this.item.preco).map((key) => [Number(key), this.item.preco[key]]);
                console.log(this.item);
                this.axios
                    .post('http://localhost:8000/api/items', this.item)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>