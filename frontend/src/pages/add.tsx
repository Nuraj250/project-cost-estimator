import { useState } from 'react';
import { useMutation } from '@apollo/client';
import { ADD_PROJECT, GET_PROJECTS } from '../graphql/queries';
import GlassCard from '../components/GlassCard';
import Input from '../components/Input';
import Button from '../components/Button';
import React from 'react';

export default function AddProject() {
  const [name, setName] = useState('');
  const [hours, setHours] = useState(0);

  const [addProject, { loading }] = useMutation(ADD_PROJECT, {
    refetchQueries: [{ query: GET_PROJECTS }],
  });

  const handleSubmit = async () => {
    if (!name || hours <= 0) return;
    await addProject({ variables: { name, assumed_hours: hours } });
    setName('');
    setHours(0);
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-black via-gray-900 to-purple-900 text-white flex items-center justify-center p-4">
      <GlassCard className="max-w-md w-full">
        <h2 className="text-2xl font-bold mb-4">Add New Project</h2>
        <Input label="Project Name" value={name} onChange={(e) => setName(e.target.value)} />
        <Input
          label="Assumed Hours"
          type="number"
          value={hours}
          onChange={(e) => setHours(parseInt(e.target.value))}
        />
        <Button label={loading ? 'Submitting...' : 'Submit'} onClick={handleSubmit} />
      </GlassCard>
    </div>
  );
}
