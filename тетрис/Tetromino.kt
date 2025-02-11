package com.example.tetrisgame

import android.graphics.Color

// Определяем фигуры (тетромино) как двумерные массивы
enum class TetrominoType(val shape: Array<IntArray>, val color: Int) {
    I(arrayOf(intArrayOf(1, 1, 1, 1)), Color.CYAN),
    O(arrayOf(intArrayOf(1, 1), intArrayOf(1, 1)), Color.YELLOW),
    T(arrayOf(intArrayOf(0, 1, 0), intArrayOf(1, 1, 1)), Color.MAGENTA),
    L(arrayOf(intArrayOf(0, 0, 1), intArrayOf(1, 1, 1)), Color.BLUE),
    J(arrayOf(intArrayOf(1, 0, 0), intArrayOf(1, 1, 1)), Color.rgb(255, 165, 0)), // Оранжевый
    S(arrayOf(intArrayOf(0, 1, 1), intArrayOf(1, 1, 0)), Color.GREEN),
    Z(arrayOf(intArrayOf(1, 1, 0), intArrayOf(0, 1, 1)), Color.RED);
}

// Класс фигуры (тетромино)
class Tetromino(val type: TetrominoType, var x: Int = 4, var y: Int = 0) {
    val shape = type.shape
    val color = type.color

    // Метод поворота фигуры
    fun rotate(): Array<IntArray> {
        val rotated = Array(shape[0].size) { IntArray(shape.size) }
        for (i in shape.indices) {
            for (j in shape[i].indices) {
                rotated[j][shape.size - 1 - i] = shape[i][j]
            }
        }
        return rotated
    }
}
