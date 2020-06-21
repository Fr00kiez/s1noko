<template>
    <table class="table">
        <thead>
            <tr>
                <th v-for="field in fields" :key="field.key">{{ field.label }}</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template v-if="loading">
                <tr>
                    <td :colspan="fields.length + 1">Memuat data...</td> 
                </tr>
            </template>
            <template v-else>
                <tr v-for="(rowItem, rowIdx) in tableItems" :key="rowIdx">
                    <td v-for="(cellItem, cellIdx) in rowItem" :key="cellIdx">{{ cellItem }}</td>
                    <td>ACTIONS</td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
    import axios from 'axios';

    export default {
        props: {
            fields: { type: Array, default: () => [] },
            items: { type: Array, default: () => [] },
            url: { type: String },
        },
        data() {
            return {
                tableItemsData: [],
                loading: false,
            };
        },
        computed: {
            tableKeys() {
                return this.fields.map(field => field.key);
            },
            tableItems() {
                return this.tableItemsData.map(item => {
                    return this.tableKeys.map(key => item[key] || '-');
                });
            },
        },
        mounted() {
            if (this.url) {
                this.fetchFromURL(this.url);
            } else {
                this.tableItemsData = this.items;
            }
        },
        methods: {
            async fetchFromURL(url) {
                this.loading = true;

                const { data } = await axios.get(url);

                this.tableItemsData = data.data;
                this.loading = false;
            }
        }
    }
</script>
