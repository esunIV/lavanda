package com.example.tetrisgame

import kotlin.random.Random

class TetrisGame {
    private val width = 10
    private val height = 20
    private val grid = Array(height) { IntArray(width) { 0 } }
    private var currentTetromino: Tetromino? = null

    init {
        spawnTetromino()
    }

    fun spawnTetromino() {
        val types = TetrominoType.values()
        currentTetromino = Tetromino(types[Random.nextInt(types.size)])
    }

    fun moveLeft() {
        currentTetromino?.let {
            if (!checkCollision(it.shape, it.x - 1, it.y)) {
                it.x--
            }
        }
    }

    fun moveRight() {
        currentTetromino?.let {
            if (!checkCollision(it.shape, it.x + 1, it.y)) {
                it.x++
            }
        }
    }

    fun rotate() {
        currentTetromino?.let {
            val rotatedShape = it.rotate()
            if (!checkCollision(rotatedShape, it.x, it.y)) {
                it.shape.indices.forEach { i ->
                    it.shape[i] = rotatedShape[i]
                }
            }
        }
    }

    fun moveDown(): Boolean {
        currentTetromino?.let {
            if (!checkCollision(it.shape, it.x, it.y + 1)) {
                it.y++
                return true
            } else {
                placeTetromino()
                spawnTetromino()
                return false
            }
        }
        return false
    }

    private fun checkCollision(shape: Array<IntArray>, x: Int, y: Int): Boolean {
        for (i in shape.indices) {
            for (j in shape[i].indices) {
                if (shape[i][j] != 0) {
                    val newX = x + j
                    val newY = y + i
                    if (newX < 0 || newX >= width || newY >= height || grid[newY][newX] != 0) {
                        return true
                    }
                }
            }
        }
        return false
    }

    private fun placeTetromino() {
        currentTetromino?.let {
            for (i in it.shape.indices) {
                for (j in it.shape[i].indices) {
                    if (it.shape[i][j] != 0) {
                        grid[it.y + i][it.x + j] = it.color
                    }
                }
            }
        }
    }
}
