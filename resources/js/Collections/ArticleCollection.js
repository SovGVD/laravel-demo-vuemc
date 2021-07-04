import { Collection } from "vue-mc"
import Article from "../Models/Article.js"

export default class AricleCollection extends Collection {
    options() {
        return {
            model: Article,
            orderBy: 'date',
        }
    }

    routes() {
        return {
            fetch: '/article',
        }
    }
}
