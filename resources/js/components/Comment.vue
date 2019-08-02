<template>
    <div>
        <div class="border rounded px-3 pt-3 pb-2">
            <div class="mb-2">
            <!-- format date with PHP (see Comment Model)-->
            <!-- <p class="text-sm text-grey-dark mb-2">{{ comment.name }} - {{ comment.human_created_at }}</p> -->
            <!-- format date with JS -->
                <p class="text-sm text-grey-dark mb-2">
                    {{ comment.name }} - il y a {{ diffForHumans }}
                </p>

                <p v-if="edit">
                    <textarea class="border w-full rounded p-5" v-model="bodyUpdate"></textarea>
                </p>
                <div v-else>
                    {{ comment.body }}
                    <hr class="border">
                    <p v-if="edit" class="flex -mx-2 mt-2">
                        <button type="button" class="mx-2 flex items-center text-sm text-grey-dark font-semibold"
                        @click="cancel() ">
                            <svg class="fill-current text-grey-dark h-3 mr-pxm pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
                            Annuler
                        </button>

                        <button type="button" class="mx-2 flex items-center text-sm text-grey-dark font-semibold ml-4"
                        @click="updateComment()">
                            <svg class="fill-current text-grey-dark h-3 mr-px pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h14l4 4v14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5 0v6h10V2H5zm6 1h3v4h-3V3z"></path></svg>
                            Sauvegarder
                        </button>
                    </p>
                    <p v-else class="flex -mx-2  mt-2">
                        <button type="button" class="mx-2 flex items-center text-sm text-grey-dark font-semibold"
                        @click="$emit('respond-to', comment)">
                            <svg class="fill-current text-grey-dark h-3 mr-px pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M15 17v-2.99A4 4 0 0 0 11 10H8v5L2 9l6-6v5h3a6 6 0 0 1 6 6v3h-2z"></path></svg>
                            Répondre
                        </button>

                        <button type="button" class="mx-2 flex items-center text-sm text-grey-dark font-semibold ml-4"
                        @click="edit = true">
                            <svg class="fill-current text-grey-dark h-2 mr-px pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"></path></svg>
                            Modifier
                        </button>
                    </p>
                </div>

            </div>
        </div>

        <div class="mt-4 pl-4 border-l-4">

            <comment class="mb-4" v-for="child in comment.children" :key="child.id" :comment="child" :now="now" @respond-to="$emit('respond-to', $event)"></comment>

        </div>
    </div>
</template>

<script>
    // date-fns : Modern JavaScript date utility library (https://date-fns.org/)
    import { formatDistance /*addSeconds*/ } from "date-fns";
    // import { fr } from "date-fns/locale";

    export default {
        name: "comment",
        props: ["comment", "now"],
        computed: {
            diffForHumans() {
                return formatDistance(new Date(this.comment.created_at), this.now, {
                    locale: fr
                });
            }
        },
        data() {
            return {
                edit: false,
                bodyUpdate: this.comment.body
            };
        },
        computed: {
            fullForm() {
                if (this.respondTo) {
                    return {
                        ...this.form,
                        respond_to_id: this.respondTo.id
                    };
                }
                return this.form;
            }
        },
        methods: {
            // updateComment($id, $bodyUpdate) {
            updateComment() {
                this.comment.body = this.bodyUpdate
                this.edit = false
                // axios

                    // .post("/comments/" +this.comment.id, this.comment.body)
                    //  .then(response) => {this.comments.push(response.data)}=.then({data}) => {this.comments.push(data)}
            },
            cancel() {
                this.edit = false
                this.bodyUpdate = this.comment.body
            }
        }
    };
</script>