<script setup lang="ts">
import {PropType} from "vue";
import Input from "@/components/Forms/Input.vue";

defineProps({
  form: {
    type: Object as PropType<ISupplier>,
    required: true
  }
})
</script>

<template>
  <Input class=w-full :required="true" id="name" placeholder="Digite o nome" label="Nome"
         v-model="form.name"/><Input :required="true" id="cnpj" placeholder="Digite o CPF/CNPJ" label="CNPJ"
                                     v-model="form.cpf_cnpj"/>
  <div class="flex flex-row gap-2">
    <Input class="w-1/2" id="email" placeholder="Digite o e-mail" label="Email"
           v-model="form.email"/>
    <Input class="w-1/2" id="phone" placeholder="Digite o celular" label="Celular"
           v-model="form.phone"/>
  </div>
  <hr class="h-px my-2 bg-blue-100 border-0 dark:bg-blue-300">
  <div class="flex flex-row gap-2">
    <Input class="w-1/2" id="state" placeholder="Digite o Estado" label="Estado"
           v-model="form.state"/>
    <Input class="w-1/2" id="city" placeholder="Digite a cidade" label="Cidade"
           v-model="form.city"/>
  </div>
  <div class="flex flex-row gap-2">
    <Input class="w-full" id="address" placeholder="Digite o endereço" label="Endereço"
           v-model="form.address"/>
    <Input id="number" placeholder="Digite o número" label="Número"
           v-model="form.number"/>
  </div>
</template>
