import React, { useState } from 'react';
import { useRouter } from 'next/router';
import { useMutation, useQuery } from '@apollo/client';
import { GET_STAFF, GET_PROJECTS, ADD_PROJECT } from '../graphql/queries';

const ProjectForm: React.FC = () => {
    const [name, setName] = useState('');
    const [hours, setHours] = useState<number>(0);
    const [selectedStaff, setSelectedStaff] = useState<number[]>([]);

    const router = useRouter();

    const { data, loading: staffLoading, error: staffError } = useQuery(GET_STAFF);
    const [addProject, { loading: mutationLoading }] = useMutation(ADD_PROJECT, {
        refetchQueries: [{ query: GET_PROJECTS }],
    });

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        if (!name || hours <= 0 || selectedStaff.length === 0) return;
        console.log(selectedStaff);
        try {
            await addProject({
                variables: {
                    name,
                    assumed_hours: hours,
                    staff: selectedStaff,
                },
            });
            alert('Project created successfully!');
            router.push('/');
        } catch (err) {
            console.error(err);
            alert('Failed to create project.');
        }
    };

    const toggleMember = (id: number) => {
        setSelectedStaff(prev =>
            prev.includes(id) ? prev.filter(i => i !== id) : [...prev, id]
        );
    };

    if (staffLoading) return <p className="text-center mt-10 text-white">Loading team...</p>;
    if (staffError) return <p className="text-center mt-10 text-red-400">Error loading staff.</p>;

    return (
        <div className="max-w-3xl mx-auto bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-xl mt-10 border border-white/20">
            <h2 className="text-3xl font-bold mb-6 text-center text-white">Create New Project</h2>
            <form onSubmit={handleSubmit} className="space-y-6">
                <div>
                    <label className="block text-sm font-semibold mb-2 text-white">Project Title</label>
                    <input
                        type="text"
                        className="w-full p-3 rounded-lg bg-white/10 text-white border border-white/20"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                        required
                    />
                </div>

                <div>
                    <label className="block text-sm font-semibold mb-2 text-white">Estimated Hours</label>
                    <input
                        type="number"
                        className="w-full p-3 rounded-lg bg-white/10 text-white border border-white/20"
                        value={hours}
                        onChange={(e) => setHours(Number(e.target.value))}
                        required
                    />
                </div>

                <div>
                    <label className="block text-sm font-semibold mb-2 text-white">Select Team Members</label>
                    <div className="flex flex-wrap gap-2">
                        {data.staff.map((member: any) => (
                            <button
                                type="button"
                                key={member.id}
                                className={`px-4 py-2 rounded-full border transition ${selectedStaff.includes(member.id)
                                        ? 'bg-purple-600 text-white border-purple-600'
                                        : 'bg-white/10 text-white border-white/20'
                                    }`}
                                onClick={() => toggleMember(member.id)}
                            >
                                {member.name}
                            </button>
                        ))}
                    </div>
                </div>

                <button
                    type="submit"
                    disabled={mutationLoading}
                    className="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition"
                >
                    {mutationLoading ? 'Creating...' : 'Create Project'}
                </button>
            </form>
        </div>
    );
};

export default ProjectForm;
