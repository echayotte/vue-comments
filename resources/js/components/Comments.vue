<template>
    <div>
        <div class="border-b-l pb-4 mb-8">
            <comment
                class="mb-4"
                v-for="comment in comments"
                :key="comment.id"
                :comment="comment"
                :now="now"
                @respond-to="respondTo = $event"
            ></comment>
            <div v-if="nextPage" class="flex justify-center">
                <button
                    id="remaining-comments"
                    class="text-grey-darker text-sm"
                    @click="fetchComments(nextPage)"
                >Charger les {{ remainingComments }} commentaires suivants...</button>
            </div>
        </div>

        <comment-form
            :respond-to="respondTo"
            @newComment="newComment"
            @cancel-respond-to="respondTo = null"
        ></comment-form>

    </div>
</template>

<script>
    import Comment from "./Comment.vue";
    import CommentForm from "./CommentForm.vue";

    export default {
        components: {
            Comment,
            CommentForm
        },
        data() {
            return {
                comments: [],
                now: new Date(),
                respondTo: null,
                nextPage: null,
                remainingComments: 0,
            };
        },

        mounted() {

            setInterval(() => {
                //  this.now = addSeconds(this.now, 10);
                this.now = new Date();
            }, 1000);

            this.fetchComments("/comments/" + btoa(window.location.href));
        },

        methods: {
            fetchComments(url) {

                axios.get(url).then(({ data: pagination }) => {
                    this.remainingComments = pagination.total - pagination.to;

                    if (this.remainingComments == 1) {
                        var btn = document.getElementById("remaining-comments");
                        btn.innerHTML = "Charger le dernier commentaire";
                    }
                    this.comments = this.comments.concat(pagination.data);
                    let oldUrl = pagination.next_page_url;

                    if (oldUrl == null) {
                        this.nextPage = null;
                    } else {
                        this.nextPage = oldUrl.replace(
                            "http://127.0.0.1:8000",
                            "http://localhost:3000"
                        );
                    }
                });
            },

            newComment(comment) {
                if (!this.respondTo) {
                    this.comments.push(comment);
                    this.respondTo = null;
                    return;
                }
                this.respondTo.children.push(comment);
                this.respondTo = null;
            }
        }
    };
</script>