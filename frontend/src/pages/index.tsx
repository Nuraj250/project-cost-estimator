import { useQuery } from '@apollo/client';
import { GET_PROJECTS } from '../graphql/queries';
import GlassCard from '../components/GlassCard';
import React from 'react';
import Link from 'next/link';

export default function Home() {
  const { data, loading, error } = useQuery(GET_PROJECTS);

  return (
    <div className="min-h-screen bg-gradient-to-br from-black via-gray-900 to-purple-900 text-white p-8">
      <h1 className="text-3xl font-bold mb-6">Projects</h1>
      {loading ? (
        <p>Loading...</p>
      ) : error ? (
        <p>Error loading projects</p>
      ) : (
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {data.projects.map((project: any) => (
            <GlassCard key={project.id}>
              <h2 className="text-xl font-semibold">{project.name}</h2>
              <p className="text-sm text-gray-300">
                Assumed Hours: {project.assumed_hours}
              </p>
              <p className="text-sm text-gray-300">
                Staff: {project.staff.map((s: any) => s.name).join(', ')}
              </p>
            </GlassCard>
          ))}
        </div>
      )}
    </div>
  );
}
