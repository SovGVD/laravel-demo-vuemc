<template>
    <div>
        <div class="articles">
            <article-preview v-for="article in articles.models" :key="article.id" :article="article"></article-preview>
        </div>
        <div class="alert alert-danger" v-if='articles.fatal'>
            Unable to load
        </div>
        <div class="loading" v-else-if="articles.loading">
            Loading...
        </div>
        <div class="load-mode" v-if="!articles.isLastPage()">
            <button @click="loadArticles()" type="button" class="btn btn-primary">Load more</button>
        </div>
    </div>
</template>

<script>
    import ArticlePreview from '../../Shared/ArticlePreview.vue';
    import ArticleCollection from '../../../Collections/ArticleCollection.js';

    export default {
        components: {
            ArticlePreview
        },

        mounted() {
            this.loadArticles();
        },

        data() {
            return {
                articles: new ArticleCollection,
            }
        },

        methods: {
            loadArticles() {
                // TODO for vue-mc: colection should also have .errors
                // TODO for vue-mc: it will be great to have old-school pagination too
                let page = this.articles.getPage() || 0;

                this.articles.page(page).fetch();
            }
        },
    }
</script>
