import { useQuery } from '@apollo/client';
import { GET_PROJECTS } from '../graphql/queries';
import GlassCard from '../components/GlassCard';
import React from 'react';

export default function CostSummary() {
  const { data, loading } = useQuery(GET_PROJECTS);

  const calculateTotalCost = (project: any) => {
    const expense = project.expenses.reduce((a: number, e: any) => a + e.amount, 0);
    const payment = project.payments.reduce((a: number, p: any) => a + p.amount, 0);
    return { expense, payment };
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-black via-gray-900 to-purple-900 text-white p-8">
      <h1 className="text-3xl font-bold mb-6">Cost Summary</h1>
      {loading ? (
        <p>Loading...</p>
      ) : (
        data.projects.map((project: any) => {
          const { expense, payment } = calculateTotalCost(project);
          return (
            <GlassCard key={project.id} className="mb-4">
              <h2 className="text-xl font-bold">{project.name}</h2>
              <p className="text-sm text-gray-300">Expenses: ${expense}</p>
              <p className="text-sm text-gray-300">Payments: ${payment}</p>
            </GlassCard>
          );
        })
      )}
    </div>
  );
}
