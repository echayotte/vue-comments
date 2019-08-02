<template>
    <form class="flex flex-col mb-32" @submit.prevent="submitComment">
        <div class="mb-3">
            <h3 class="font-normal text-md text-teal-dark">Nouveau commentaire</h3>
            <p class="text-xs text-teal-dark" v-if="respondTo">
                En réponse à
                <span class="font-semibold">{{ respondTo.name }}</span>
                : " {{ respondTo.body }} "
                <button
                    class="bg-orange hover:bg-orange-dark text-white text-xs font-bold py-1 px-2 ml-1 rounded"
                    @click="$emit('cancel-respond-to')"
                >Annuler</button>
            </p>
        </div>

        <div class="mb-3">
            <input
                class="w-full border rounded p-3 text-teal-light"
                type="text"
                placeholder="Pseudo"
                :class="{'border-red' : errors.name}"
                v-model="form.name"
            >
            <p class="text-red text-sm px-3 py-1" v-if="errors.name" v-text="errors.name[0]"></p>
        </div>

        <div class="mb-3">
            <textarea
                class="border w-full rounded p-3 text-teal-light"
                placeholder="Commentaire"
                :class="{'border-red' : errors.body}"
                v-model="form.body"
            ></textarea>
            <p class="text-red text-sm px-3 py-1" v-if="errors.body" v-text="errors.body[0]"></p>
        </div>

        <button type="submit" class="border rounded py-2 hover:bg-teal hover:text-white text-teal">Commenter</button>
    </form>
</template>

<script>
    export default {
        props: ["respondTo"],
        data() {
            return {
                form: {
                    name: "",
                    body: "",
                    url: window.location.href
                },
                errors: {}
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
            submitComment() {
                axios
                    .post("/comments/", this.fullForm)
                    //  .then(response) => {this.comments.push(response.data)}=.then({data}) => {this.comments.push(data)}
                    .then(({ data }) => {
                        // communicate with parent
                        this.$emit("newComment", data);
                        this.form.body = "";
                        this.errors = {};
                        if(this.respondTo) {
                            this.$emit("cancel-respond-to");
                        }
                    })
                    .catch(error => {
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors;
                    });
            }
        }
    };
</script>