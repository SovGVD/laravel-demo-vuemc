<template>
    <div>
        <div class="alert alert-danger" v-if='articles.fatal'>
            Unable to load
        </div>
        <div class="loading" v-else-if="articles.loading">
            Loading...
        </div>
        <div class="articles" v-else>
            <article-preview v-for="article in articles.models" :key="article.id" :article="article"></article-preview>
        </div>
        <div class="pagination">
        </div>
    </div>
</template>

<script>
    import ArticlePreview from './ArticlePreview.vue';
    import ArticleCollection from '../../../Collections/ArticleCollection.js';

    export default {
        components: { ArticlePreview },

        mounted() {
            this.loadArticles();
        },

        data() {
            return {
                articles: new ArticleCollection,
            }
        },

        computed: {
            page() {
                return this.$route.params.pageNum || 1;
            }
        },

        methods: {
            loadArticles() {
                this.articles.page(this.page).fetch();
                // TODO for vue-mc colection should also have .errors
            }
        },
    }
</script>
