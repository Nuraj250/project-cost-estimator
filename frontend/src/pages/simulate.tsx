import React from 'react';
import GlassCard from '../components/GlassCard';

export default function Simulate() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-black via-gray-900 to-purple-900 text-white flex items-center justify-center p-8">
      <GlassCard className="max-w-xl w-full">
        <h2 className="text-2xl font-bold mb-4">Payment Simulation</h2>
        <p className="text-gray-300">Simulate loan repayment, installment schedules, or impact analysis here. (Placeholder view)</p>
      </GlassCard>
    </div>
  );
}
