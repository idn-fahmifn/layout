<script setup>
// Mengimpor komponen bawaan (asumsi path ini valid untuk setup Anda)
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';


// --- Logika Inertia/Vue ---
// Form untuk membuat tugas baru (CREATE)
const form = useForm({
  // name
});

const submitTask = () => {
  // Kirim request POST ke route tasks.store
};

const priorityOptions = [
  { value: 'low', label: 'Low' },
  { value: 'medium', label: 'Medium' },
  { value: 'high', label: 'High' },
];

</script>

<template>
  <AuthenticatedLayout title="Task">

    <Head title="Create New Task" />

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Create New Task</h1>
        <Link :href="route('task.index')"
          class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
        Back
        </Link>
      </div>

      <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">

        <form @submit.prevent="submitTask" class="space-y-6">

          <div>
            <InputLabel for="title" value="Task Name" />
            <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.task_name" required autofocus
              placeholder="Ex: Laundry Day" />
            <InputError class="mt-2" :message="form.errors.task_name" />
          </div>

          <div>
            <InputLabel for="priority" value="Priority" />
            <select id="priority" v-model="form.priority" required
              class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm">
              <option v-for="option in priorityOptions" :key="option.value" :value="option.value">
                {{ option.label }}
              </option>
            </select>
            <InputError class="mt-2" :message="form.errors.priority" />
          </div>

          <div>
            <InputLabel for="title" value="Dateline" />
            <TextInput id="title" type="date" class="mt-1 block w-full" v-model="form.dateline" required autofocus
              placeholder="Ex: Laundry Day" />
            <InputError class="mt-2" :message="form.errors.task_name" />
          </div>

          <div>
            <InputLabel for="description" value="Description" />
            <textarea id="description"
              class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm"
              v-model="form.description" rows="4"
              placeholder="Describe about detail task."></textarea>
            <InputError class="mt-2" :message="form.errors.description" />
          </div>

          <div class="flex justify-end pt-4">
            <PrimaryButton :class="{ 'opacity-50': form.processing }" :disabled="form.processing || !form.title">
              Create Task
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>