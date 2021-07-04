import { Model } from "vue-mc"

export default class Article extends Model {
    defaults() {
        return {
            id:          null,
            date:        null,
            title:       '',
            description: '',
            body:        '',
            tags:        [],
            user_id:     null,
        }
    }

    routes() {
        return {
            fetch: '/article/{id}',
            save:  '/article',
        }
    }
}