<template>
    <div>
        <div class="alert alert-danger" v-if='articles.fatal'>
            Unable to load
        </div>
        <div class="loading" v-else-if="articles.loading">
            Loading...
        </div>
        <div v-else>
            <div class="alert alert-info" v-if="articles.isEmpty()">
                No articles, try another page.
            </div>
            <div class="articles">
                <article-preview v-for="article in articles.models" :key="article.id" :article="article"></article-preview>
            </div>
            <pagination v-if="lastPage" :currentPage="pageNum" :lastPage="lastPage"></pagination>
        </div>
    </div>
</template>

<script>
import Pagination from '../../Shared/Pagination.vue'
import ArticlePreview from '../../Shared/ArticlePreview.vue'
import ArticleCollection from '../../../Collections/ArticleCollection.js';

export default {
    components: { 
        Pagination, 
        ArticlePreview,
    },

    props: {
        pageNum: {
            default: 1,
            type: Number,
        }
    },

    mounted() {
        this.loadArticles();
    },

    data() {
        return {
            lastPage: null,
            articles: new ArticleCollection,
        }
    },

    methods: {
        loadArticles() {
            // TODO for vuemc: .errors
            this.articles.fetchPage(this.pageNum).then((data) => {
                // TODO for vuemc: this should be somewhere in collection
                this.lastPage = parseInt(data.response.data.meta.last_page);
            });
        }
    },

    watch: {
        pageNum() {
            this.loadArticles();
        },
    },
}
</script>
